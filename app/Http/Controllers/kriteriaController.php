<?php

namespace App\Http\Controllers;

use App\Http\Resources\kriteriaResource;
use App\Models\kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=kriteria::latest()->get();
        return kriteriaResource::collection($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'nilai'=>'required',

        ]);

        $data=kriteria::create([
            'nilai'=>request('nilai'),
            'nama'=>request('nama'),
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
    public function show(kriteria $id)
    {
        return kriteriaResource::make($id);
        // return $id;
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

        // return $request;
        //   return response()->json([
        //     'message'=>request('nama'),
        //     'note'=>'aaa',
        // ]);
        request()->validate([
            'nama'=>'required',
            'nilai'=>'required',
        ]);

        DB::table('kriteria')
        ->where('id', request('id'))
        ->update([
            'nama'=>request('nama'),
            'nilai'=>request('nilai'),
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
    public function destroy(kriteria $id)
    {
        $id->delete();

        return $id;
        return response()->json([
            'message'=>'Data berhasil hapus!',
        ],200);
    }
}
