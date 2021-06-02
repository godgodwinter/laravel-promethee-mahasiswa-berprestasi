<?php

namespace App\Http\Controllers;

use App\Http\Resources\thseleksiResource;
use App\Models\thseleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class thseleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=thseleksi::latest()->get();
        return thseleksiResource::collection($datas);
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
            'tahun'=>'required',
            'kuota'=>'required',
            'status'=>'required',

        ]);

        $data=thseleksi::create([
            'tahun'=>request('tahun'),
            'kuota'=>request('kuota'),
            'status'=>request('status'),
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
    public function show(thseleksi $id)
    {
        return thseleksiResource::make($id);
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
        request()->validate([
            'tahun'=>'required',
            'kuota'=>'required',
            'status'=>'required',

        ]);

        DB::table('thseleksi')
        ->where('id', request('id'))
        ->update([
            'tahun'=>request('tahun'),
            'kuota'=>request('kuota'),
            'status'=>request('status'),
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
    public function destroy(thseleksi $id)
    {
        $id->delete();

        return $id;
        return response()->json([
            'message'=>'Data berhasil hapus!',
        ],200);
    }
}
