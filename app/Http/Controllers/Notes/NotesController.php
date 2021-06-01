<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\notes;
use App\Models\subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index(){
        $notes=notes::latest()->get();
        return NoteResource::collection($notes);
    }

    // public function show(subject $subject,notes $note){
        public function show(notes $note){
        // dd($note);
        // return new NoteResource($note);
        return NoteResource::make($note);

    }

    public function store(){
            // kasi jeda
        // sleep(1);
            //slug itu link dari judul kayak di wordpresas
        request()->validate([
            'subject'=>'required',
            'title'=>'required',
            'description'=>'required',

        ]);


        $subject_id=request('subject');
        //cari di tabel subject where id yang diinput
        $subject = subject::findOrFail($subject_id);
        // $subject=subject::where('id','=',(request('subject')->firstOrFail()));

        // $slug=Str::slug(request('subject'));
        // return $slug;
        $note=notes::create([
            'subject_id'=>$subject->id,
            'title'=>request('title'),
            // 'slug'=>request('description'),
            'slug'=>Str::slug(request('title')),//str_slug()
            'description'=>request('description'),
        ]);


    // simpan ke tabel NOTES
//    $note=DB::table('notes')->insert(
//     array(
//            'subject_id'     =>  request('subject'),
//            'title'     =>   request('title'),
//            'slug'     =>  \Str::slug(request('slug')),//str_slug()
//            'description'     =>  request('description'),
//            'created_at'=>date("Y-m-d H:i:s"),
//            'updated_at'=>date("Y-m-d H:i:s")
//     )
// );
        return response()->json([
            'message'=>'Data berhasil ditambahkan',
            'note'=>$note,
        ]);
    }

    public function update(notes $note)
    {
            //slug itu link dari judul kayak di wordpresas
        request()->validate([
            'subject'=>'required',
            'title'=>'required',
            'description'=>'required',

        ]);


        $subject_id=request('subject');
        //cari di tabel subject where id yang diinput
        $subject = subject::findOrFail($subject_id);

        $note->update([
            'subject_id'=>$subject->id,
            'title'=>request('title'),
            // 'slug'=>Str::slug(request('slug')),//str_slug()
            'description'=>request('description'),
        ]);

        return response()->json([
            'message'=>'Data berhasil diubah!',
            'note'=>$note,
        ]);
    }

    public function destroy(notes $note)
    {
        $note->delete();

        return response()->json([
            'message'=>'Data berhasil hapus!',
        ],200);
        // return $note;
    }
}
