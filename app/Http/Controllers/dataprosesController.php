<?php

namespace App\Http\Controllers;

use App\Http\Resources\dataprosesResource;
use App\Http\Resources\mahasiswaResource;
use App\Models\dataproses;
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

    public function show($id)
    {

        $datas=dataproses::latest()->where('id',$id)->first()
        ->join('mahasiswa', 'dataproses.nim', '=', 'mahasiswa.nim')
        ->select('dataproses.id',
        'dataproses.nim',
        'jurusan',
        'nama',
        'thseleksi_id',
        'hasilhitung',
        'dataproses.created_at')
        ->where('dataproses.id',$id)->first();

        return dataprosesResource::make($datas);
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
        $datas = DB::table('mahasiswa')
        ->whereNotIn('mahasiswa.nim', function($q){
            $q->select('dataproses.nim')->from('dataproses');
        })->get();

// return $datas;
        return mahasiswaResource::collection($datas);
    }
}
