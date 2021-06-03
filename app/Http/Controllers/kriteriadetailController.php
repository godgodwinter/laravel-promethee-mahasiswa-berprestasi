<?php

namespace App\Http\Controllers;

use App\Http\Resources\kriteriadetailResource;
use App\Http\Resources\kriteriadetailshowResource;
use App\Models\kriteriadetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kriteriadetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=kriteriadetail::latest()->get();
        return kriteriadetailResource::collection($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama'=>'required',
            'bobot'=>'required',
            'kriteria_id'=>'required',

        ]);

        $data=kriteriadetail::create([
            'nama'=>request('nama'),
            'bobot'=>request('bobot'),
            'kriteria_id'=>request('kriteria_id'),
        ]);

        return response()->json([
            'message'=>'Data berhasil ditambahkan',
            'data'=>$data,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
// public function ambilnamakritera($id)
// {
//     $namakriteria='asd';
//     $datas = DB::table('kriteria')->where('id',$id)->get();
//     // return view('admin.letakserver.edit',compact('datas'));
//     return $namakriteria;
// }

    public function showdetail($id)
    {

        // $datas=kriteriadetail::latest()->where('id',$id)->get();
        // return kriteriadetailResource::collection($datas);


        $datas=kriteriadetail::latest()->where('id',$id)->first();
        return kriteriadetailResource::make($datas);
        // return $datas;

        // $datas = DB::table('kriteriadetail')->where('id',$id)->get();

        // return kriteriadetailResource::make($datas);
        // return kriteriaResource::collection($id);
        // $datas = DB::table('kriteriadetail')->where('kriteria_id',$id)->get();
        // kriteriadetailResource::collection($datas);

        // return kriteriadetailResource::collection($id);
        // $datas = DB::table('kriteriadetail')->where('kriteria_id',$id)->get();
        // return kriteriadetailshowResource::make($datas);
        // return $id;
        // return $datas;
    }

    public function show($id)
    {
        // $i=1;
        // $judul="asd";
        $parrentdata = DB::table('kriteria')->where('id',$id)->get();
        $datas = DB::table('kriteriadetail')->where('kriteria_id',$id)->get();
        // return $datas;

        return compact('datas','parrentdata');        // return $judul;
        // foreach ($datas as $d ){

        // }
        // dd($datas);
        // return kriteriadetailshowResource::make($array);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $datas)
    {

        // return request();

        // return response()->json([
        //     'message'=>request('nama'),
        //     'note'=>'aaa',
        // ]);
        request()->validate([
            'nama'=>'required',
            'bobot'=>'required',

        ]);

        DB::table('kriteriadetail')
        ->where('id', request('id'))
        ->update([
            'nama'=>request('nama'),
            'bobot'=>request('bobot'),
        ]);

        return response()->json([
            'message'=>'Data berhasil diubah!',
            'note'=>$datas,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kriteria_id,$id)
    {
        // $id->delete();
         kriteriadetail::destroy($id);

        return $id;
        return response()->json([
            'message'=>'Data berhasil hapus!',
        ],200);
    }
}
