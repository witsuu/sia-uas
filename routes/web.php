<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "HomeController@dashboard")->name("dashboard");
Route::get('/karyawan','HomeController@users')->name('users');
Route::get('data-akun','HomeController@dataAkun')->name('data_akun');
Route::get('data-akun/create','HomeController@tambahDataAkun')->name('tambah_data_akun');
Route::post('data-akun/create','HomeController@storeDataAkun')->name('store_data_akun');
Route::put('data-akun/update','HomeController@editDataAkun')->name('edit_data_akun');
Route::delete('data-akun/delete','HomeController@deleteDataAkun')->name('hapus_data_akun');
Route::get('jurnal-umum','HomeController@jurnalUmumMain')->name('jurnal_umum_main');
Route::post('jurnal-umum/detail','HomeController@jurnalUmum')->name('jurnal_umum');
Route::get('jurnal-umum/create','HomeController@tambahJurnalUmum')->name('tambah_jurnal_umum');
Route::post('jurnal-umum/create','HomeController@storeJurnalUmum')->name('store_jurnal_umum');
Route::post('jurnal-umum/update','HomeController@editJurnalUmumPage')->name('edit_jurnal_umum');
Route::put('jurnal-umum/update','HomeController@editJurnalUmum')->name('edit_jurnal_umum');
Route::delete('jurnal-umum/delete','HomeController@deleteJurnalUmum')->name('hapus_jurnal_umum');
Route::get('buku-besar', 'HomeController@bukuBesarMain')->name('buku_besar_main');
Route::post('buku-besar/detail','HomeController@bukuBesar')->name('buku_besar');
Route::get('neraca','HomeController@neracaMain')->name('neraca_main');
Route::post('neraca/detail','HomeController@neraca')->name('neraca');
Route::get('laporan','HomeController@laporan')->name('laporan');

Auth::routes();
