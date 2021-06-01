<?php

namespace App\Http\Controllers;

use App\Http\Resources\mahasiswaResource;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=mahasiswa::latest()->get();
        return mahasiswaResource::collection($datas);
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
        // sleep(1);
        // dd(request('nim'));
        request()->validate([
            'nama'=>'required',
            'nim'=>'required|unique:mahasiswa',
            'jk'=>'required',
            'jurusan'=>'required',
            'hp'=>'required',

        ]);

        $data=mahasiswa::create([
            'nim'=>request('nim'),
            'nama'=>request('nama'),
            'jk'=>request('jk'),
            'hp'=>request('hp'),
            'jurusan'=>request('jurusan'),
        ]);

        return response()->json([
            'message'=>'Data berhasil ditambahkan',
            'data'=>$data,
        ]);


        // return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(mahasiswa $id)
    {
        return mahasiswaResource::make($id);
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
    public function update(mahasiswa $mahasiswa)
    {
        // return request('id');
        // sleep(1);
        // dd(request('nim'));
        request()->validate([
            'nama'=>'required',
            'nim'=>'required',
            'jk'=>'required',
            'jurusan'=>'required',
            'hp'=>'required',

        ]);


        // $mahasiswa->update([
        //     'nim'=>request('nim'),
        //     'nama'=>request('nama'),
        //     'jk'=>request('jk'),
        //     'hp'=>request('hp'),
        //     'jurusan'=>request('jurusan'),
        // ]);
        DB::table('mahasiswa')
        ->where('id', request('id'))
        ->update([
            'nim'=>request('nim'),
            'nama'=>request('nama'),
            'jk'=>request('jk'),
            'hp'=>request('hp'),
            'jurusan'=>request('jurusan'),
        ]);

        return response()->json([
            'message'=>'Data berhasil diubah!',
            'note'=>$mahasiswa,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahasiswa $id)
    {
        $id->delete();

        return $id;
        return response()->json([
            'message'=>'Data berhasil hapus!',
        ],200);
    }
}
