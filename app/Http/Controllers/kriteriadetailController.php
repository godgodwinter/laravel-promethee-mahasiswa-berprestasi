<?php

namespace App\Http\Controllers;

use App\Http\Resources\kriteriadetailResource;
use App\Models\kriteriadetail;
use Illuminate\Http\Request;

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
    public function show(kriteriadetail $id)
    {
        return kriteriadetailResource::make($id);
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
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama'=>'required',
            'bobot'=>'required',
            'kriteria_id'=>'required',

        ]);

        DB::table('kriteriadetail')
        ->where('id', request('id'))
        ->update([
            'nama'=>request('nama'),
            'bobot'=>request('bobot'),
            'kriteria_id'=>request('kriteria_id'),
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
    public function destroy(kriteriadetail $id)
    {
        $id->delete();

        return $id;
        return response()->json([
            'message'=>'Data berhasil hapus!',
        ],200);
    }
}
