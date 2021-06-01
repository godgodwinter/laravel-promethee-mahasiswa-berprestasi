<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Notes\NotesController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\Notes\subjectController;


//notes
// Route::group(['middleware' => ['auth:api', 'verified']], function() {
    // Route::group(['middleware' => 'auth:api'], function(){

    // MAHASISWA
    Route::get('mahasiswa', [mahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('mahasiswa/{id}', [mahasiswaController::class, 'show'])->name('mahasiswa.show');
    Route::post('mahasiswa/store', [mahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::delete('mahasiswa/{id}', [mahasiswaController::class, 'destroy'])->name('mahasiswa.delete');
    Route::patch('mahasiswa/{id}/edit', [mahasiswaController::class, 'update'])->name('mahasiswa.update');



    Route::post('notes/create-new-note', [NotesController::class, 'store'])->name('notes.store');
    Route::get('notes', [NotesController::class, 'index'])->name('notes');
    // :slug berarti di field slug,jika tidak didefinisikan maka akan id
    Route::get('notes/{note:slug}', [NotesController::class, 'show'])->name('notes.show');
    Route::patch('notes/{note:slug}/edit', [NotesController::class, 'update'])->name('notes.update');
    Route::delete('notes/{note:slug}/delete', [NotesController::class, 'destroy'])->name('notes.delete');


    // Route::get('notes/{subject}/{note:slug}', [NotesController::class, 'show'])->name('notes.show');


    // subjects
    Route::get('subjects', [SubjectController::class, 'index'])->name('subjects');

// });

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('posts')->namespace('Posts')->group(function(){
    // Route::post('create-new-post','PostController@store');

// });
