<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Notes\NotesController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\Notes\subjectController;
use App\Http\Controllers\kriteriaController;
use App\Http\Controllers\kriteriadetailController;
use App\Http\Controllers\thseleksiController;
use App\Http\Controllers\dataprosesController;


//notes
// Route::group(['middleware' => ['auth:api', 'verified']], function() {
    // Route::group(['middleware' => 'auth:api'], function(){

    // MAHASISWA
    Route::get('mahasiswa', [mahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('mahasiswa/{id}', [mahasiswaController::class, 'show'])->name('mahasiswa.show');
    Route::post('mahasiswa/store', [mahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::delete('mahasiswa/{id}', [mahasiswaController::class, 'destroy'])->name('mahasiswa.delete');
    Route::patch('mahasiswa/{id}/edit', [mahasiswaController::class, 'update'])->name('mahasiswa.update');

    // KRITERIA
    Route::get('kriteria', [kriteriaController::class, 'index'])->name('kriteria');
    Route::get('kriteria/{id}', [kriteriaController::class, 'show'])->name('kriteria.show');
    Route::post('kriteria/store', [kriteriaController::class, 'store'])->name('kriteria.store');
    Route::delete('kriteria/{id}', [kriteriaController::class, 'destroy'])->name('kriteria.delete');
    Route::patch('kriteria/{id}/edit', [kriteriaController::class, 'update'])->name('kriteria.update');
    Route::get('kriteria/{id}/show', [kriteriaController::class, 'show'])->name('kriteria.show');

    // KRITERIADETAIL
    Route::get('kriteriadetail', [kriteriadetailController::class, 'index'])->name('kriteriadetail');
    Route::get('kriteriadetail/{kritria_id}/show', [kriteriadetailController::class, 'show'])->name('kriteriadetail.show');
    Route::get('kriteriadetail/{kritria_id}', [kriteriadetailController::class, 'showdetail'])->name('kriteriadetail.showdetail');
    Route::post('kriteriadetail/store', [kriteriadetailController::class, 'store'])->name('kriteriadetail.store');
    Route::delete('kriteriadetail/{kritria_id}/{id}', [kriteriadetailController::class, 'destroy'])->name('kriteriadetail.delete');
    Route::patch('kriteriadetail/{id}/update', [kriteriadetailController::class, 'update'])->name('kriteriadetail.update');

    // THSELEKSI
    Route::get('thseleksi', [thseleksiController::class, 'index'])->name('thseleksi');
    Route::get('thseleksi/{id}', [thseleksiController::class, 'show'])->name('thseleksi.show');
    Route::post('thseleksi/store', [thseleksiController::class, 'store'])->name('thseleksi.store');
    Route::delete('thseleksi/{id}', [thseleksiController::class, 'destroy'])->name('thseleksi.delete');
    Route::patch('thseleksi/{id}/edit', [thseleksiController::class, 'update'])->name('thseleksi.update');


    // DATAPOSES
    Route::get('dataproses', [dataprosesController::class, 'index'])->name('dataproses');
    Route::get('dataproses/{id}', [dataprosesController::class, 'show'])->name('dataproses.show');
    Route::post('dataproses/store', [dataprosesController::class, 'store'])->name('dataproses.store');
    Route::delete('dataproses/{id}/delete/{thseleksi_id}', [dataprosesController::class, 'destroy'])->name('dataproses.delete');
    Route::get('dataproses/getmhs/{id}', [dataprosesController::class, 'getmhs'])->name('dataproses.getmhs');
    Route::get('dataproses/getkriteria/{id}', [dataprosesController::class, 'getkriteria'])->name('dataproses.getkriteria');

    // DETAILDATAPROSES
    Route::get('dataprosesdetail', [dataprosesController::class, 'dpdetail'])->name('dataprosesdetail');
    Route::get('dataprosesdetail/{id}', [dataprosesController::class, 'dpdetailshow'])->name('dataprosesdetail.show');
    Route::post('dataprosesdetail/store', [dataprosesController::class, 'dpdetailstore'])->name('dataprosesdetail.store');

    Route::get('dataprosesdetailhitung/{id}', [dataprosesController::class, 'dpdetailshowhitung'])->name('dataprosesdetailhitung.show');
    Route::patch('dataprosesdetailhitung/edit', [dataprosesController::class, 'update'])->name('dataprosesdetail.update');


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
