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
Route::resource('products','ProductController');


// login
Route::get('/login', 'otentikasi\OtentikasiController@index' )-> name('login') ;
Route::post('/login', 'otentikasi\OtentikasiController@login') -> name('login');
Route::get('/logout', 'otentikasi\OtentikasiController@logout') -> name('logout');
//midleware otentikasi
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/lihatuser', 'otentikasi\OtentikasiController@lihatuser' )-> name('lihat-user') ;
    Route::get('/tambahuser', 'otentikasi\OtentikasiController@tambah' )-> name('tambah-user') ;
    Route::post('/tambahuser/simpan', 'otentikasi\OtentikasiController@simpan') -> name('tambah-user-simpan');
    //profile user
    Route::get('/profile', 'otentikasi\OtentikasiController@profile' )-> name('profile') ;
    Route::post('/profile/simpan', 'otentikasi\OtentikasiController@profilesimpan') -> name('profile-user-simpan');
    //home
    Route::get('/home', function () {    return view('home');    });
    Route::get('/', function () {    return view('home');    });
    Route::post('/bukuinduk/print/{id}', 'bukuindukController@print') -> name('bukuinduk-print');
    Route::resource('parameteruji','parameterujiController');
    Route::resource('bukuinduk','bukuindukController');
    Route::resource('datapelanggan','datapelangganController');
    Route::delete('/userdel/{id}','datapelangganController@destroy')->name('userdel');
    Route::get('/reset/{id}','datapelangganController@resetpass')->name('resetpass');
});