<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
// use App\Http\Controllers\TestQueueEmails;
// use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\BukuController::class, 'landing'], function () {
    return view('welcome');
});

Auth::routes();

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::resource('peminjaman', \App\Http\Controllers\PeminjamanController::class)
    ->middleware('auth');

Route::resource('pengembalian', \App\Http\Controllers\PengembalianController::class)
    ->middleware('auth');

Route::get('/get', [\App\Http\Controllers\UserController::class, 'ambil']);

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/buku', [\App\Http\Controllers\BukuController::class, 'index']);
Route::resource('buku', \App\Http\Controllers\BukuController::class)
    ->middleware('auth');

Route::get('/create-pdf-file', [PDFController::class, 'index'])->name('pdf.create');


// Route::get('/buku', [\App\Http\Controllers\BukuController::class, 'index'])->name('buku.index')
//     ->middleware('auth');
// Route::put('/buku/{buku}', [\App\Http\Controllers\BukuController::class, 'update'])
//     ->name('buku.update')
//     ->middleware('auth');
// Route::get('/buku/{buku:id}/edit', [\App\Http\Controllers\BukuController::class, 'edit'])
//     ->name('buku.edit')
//     ->middleware('auth');
// Route::delete('/buku/{buku:kode_buku}', [\App\Http\Controllers\BukuController::class, 'destroy'])
//     ->name('buku.destroy')
//     ->middleware('auth');
// Route::get('/buku/create', [\App\Http\Controllers\BukuController::class, 'create'])
//     ->name('buku.create')
//     ->middleware('auth');
// Route::post('/buku/store', [\App\Http\Controllers\BukuController::class, 'store'])
//     ->name('buku.store')
//     ->middleware('auth');

Route::resource('member', \App\Http\Controllers\MemberController::class)
    ->middleware('auth');

Route::get('sending-queue-emails', [\App\Http\Controllers\TestQueueEmails::class, 'sendTestEmails'])->name('emailsend');

//Route::get('kirim-email', 'App\Http\Controllers\MailController@index');
