<?php

namespace App\Http\Controllers;

use App\Http\Resources\dataprosesdetailResource;
use App\Http\Resources\dataprosesResource;
use App\Http\Resources\kriteriadetailResource;
use App\Http\Resources\mahasiswaResource;
use App\Models\dataproses;
use App\Models\dataprosesdetail;
use App\Models\kriteriadetail;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dataprosesController extends Controller
{
    //
    public function index()
    {
        $datas=DB::table('dataproses')
            ->join('mahasiswa', 'dataproses.nim', '=', 'mahasiswa.nim')
            ->get(array(
                'dataproses.id',
                'dataproses.nim',
                'jurusan',
                'nama',
                'thseleksi_id',
                'hasilhitung',
                'dataproses.created_at',
            ));
            // return $datas;
        return dataprosesResource::collection($datas);
    }

    public function dpdetail()
    {
        $datas=dataprosesdetail::latest()->get();
            // return $datas;
        return dataprosesdetailResource::collection($datas);
    }

    public function dpdetailshow($id)
    {
        // $datas=dataprosesdetail::latest()
        // ->where('thseleksi_id', request('id'))
        // ->get();


        $datas=DB::table('dataprosesdetail')
            ->join('kriteriadetail', 'dataprosesdetail.kriteriadetail_id', '=', 'kriteriadetail.id')
            ->get(array(
                'dataprosesdetail.id',
                'dataprosesdetail.nim',
                'dataprosesdetail.thseleksi_id',
                'dataprosesdetail.bobot_kd',
                'dataprosesdetail.kriteria_id',
                'dataprosesdetail.created_at',
                'kriteriadetail.nama',
            ));

            // return $datas;
        return dataprosesdetailResource::collection($datas);
    }

    public function show($id)
    {


        $datas=DB::table('dataproses')
            ->join('mahasiswa', 'dataproses.nim', '=', 'mahasiswa.nim')
            ->where('dataproses.thseleksi_id',$id)
            ->get(array(
                'dataproses.id',
                'dataproses.nim',
                'jurusan',
                'nama',
                'thseleksi_id',
                'hasilhitung',
                'dataproses.created_at',
            ));
            // return $datas;
        return dataprosesResource::collection($datas);

        // $datas=dataproses::latest()->where('id',$id)->first()
        // ->join('mahasiswa', 'dataproses.nim', '=', 'mahasiswa.nim')
        // ->select('dataproses.id',
        // 'dataproses.nim',
        // 'jurusan',
        // 'nama',
        // 'thseleksi_id',
        // 'hasilhitung',
        // 'dataproses.created_at')
        // ->where('dataproses.id',$id)->first();

        // return dataprosesResource::make($datas);
    }
    public function store(Request $request)
    {
        request()->validate([
            'nim'=>'required',
            // 'thseleksi_id'=>'required',
            // 'hasilhitung'=>'required',

        ]);

        $data=dataproses::create([
            'nim'=>request('nim'),
            'thseleksi_id'=>request('thseleksi_id'),
            'hasilhitung'=>0,
        ]);

        return response()->json([
            'message'=>'Data berhasil ditambahkan',
            'data'=>$data,
        ]);
    }

    public function destroy($id)
    {
        dataproses::destroy($id);

        // return $id;
        return response()->json([
            'message'=>'Data berhasil hapus!',
        ],200);
    }

    public function getmhs($id)
    {
        // global $thseleksi_id;
       global $global_id;
       $global_id=$id;
        $datas = DB::table('mahasiswa')
        ->whereNotIn('mahasiswa.nim', function($q){
            global $id;
            $q->select('dataproses.nim')->from('dataproses')->where('dataproses.thseleksi_id',$GLOBALS["global_id"]);
        })->get();

        // $datas = DB::table('mahasiswa')
        // ->whereNotIn('mahasiswa.nim', function($q){
        //     $q->select('dataproses.nim')->from('dataproses');
        // })->get();

// return $datas;
        return mahasiswaResource::collection($datas);
    }

    public function getkriteria($id)
    {

        $datas=kriteriadetail::latest()->where('kriteria_id',$id)->get();
        return kriteriadetailResource::collection($datas);
    }

    public function dpdetailstore(Request $request)
    {


        $kriteriadetail_id=$request->kriteriadetail_id;
        $bobot_kd=kriteriadetail::latest()->where('id',$kriteriadetail_id)->first();


        // return response()->json([
        //     'message'=>$bobot_kd['bobot'],
        //     // 'data'=>$ambildatasebelumnya,
        // ]);
        //periksa apakah nik  sudah ada
        $ambildatasebelumnya= DB::table('dataprosesdetail')
            ->where('nim',$request->nim)
            ->where('thseleksi_id',$request->thseleksi_id)
            ->where('kriteria_id',$request->kriteria_id)
            ->count();

        if($ambildatasebelumnya>0){

            DB::table('dataprosesdetail')
        ->where('thseleksi_id',$request->thseleksi_id)
        ->where('nim',$request->nim)
        ->where('kriteria_id',$request->kriteria_id)
        ->update([
            'kriteriadetail_id'=>$request->kriteriadetail_id,
            'bobot_kd'=>$bobot_kd['bobot'],
        ]);


            return response()->json([
            'message'=>'Data telah di ubah',
            'data'=>$ambildatasebelumnya,
        ]);
        // break;
        }



        //ambil_bobotkd
        // return $bobot_kd['bobot'];

        $data=dataprosesdetail::create([
            'nim'=>$request->nim,
            'thseleksi_id'=>$request->thseleksi_id,
            'kriteria_id'=>$request->kriteria_id,
            'kriteriadetail_id'=>$request->kriteriadetail_id,
            // 'thseleksi_id'=>request('thseleksi_id'),
            // 'kriteria_id'=>request('kriteria_id'),
            'bobot_kd'=>$bobot_kd['bobot'],
        ]);

        return response()->json([
            'message'=>'Data berhasil ditambahkan',
            // 'data'=>$data,
        ]);

        // return 'dpdetail store lnjut';

        // request()->validate([
        //     'nim'=>'required',
        //     // 'thseleksi_id'=>'required',
        //     // 'hasilhitung'=>'required',

        // ]);

        // $data=dataproses::create([
        //     'nim'=>request('nim'),
        //     'thseleksi_id'=>request('thseleksi_id'),
        //     'hasilhitung'=>0,
        // ]);

        // return response()->json([
        //     'message'=>'Data berhasil ditambahkan',
        //     'data'=>$data,
        // ]);
    }
}
