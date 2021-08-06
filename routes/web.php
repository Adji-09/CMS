<?php

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

Route::group(['middleware' => ['web']], function (){
    // DASHBOARD, LOGIN, LOGOUT
    Route::get('/', 'User@index');
    Route::get('/login', 'User@login');
    Route::post('/loginPost', 'User@loginPost');
    Route::get('/logout', 'User@logout');

    // SLIDE BANNER
    Route::get('/slideBanner', 'SlideBanner@index');
    Route::post('/slideBanner/store', 'SlideBanner@store');
    Route::get('/slideBanner/edit/{id}', 'SlideBanner@edit');
    Route::post('/slideBanner/update', 'SlideBanner@update');
    Route::delete('/slideBanner/delete/{id}', 'SlideBanner@delete');

    // TENTANG
    Route::get('/tentang', 'Tentang@index');
    Route::post('/tentang/store', 'Tentang@store');

    // PUBLIKASI
    Route::get('/publikasiCms', 'Publikasi@index');
    Route::post('/publikasiCms/store', 'Publikasi@store');
    Route::get('/publikasiCms/edit/{id}', 'Publikasi@edit');
    Route::post('/publikasiCms/update', 'Publikasi@update');
    Route::delete('/publikasiCms/delete/{id}', 'Publikasi@delete');

    // PERATURAN
    Route::get('/peraturan', 'Peraturan@index');
    Route::post('/peraturan/store', 'Peraturan@store');
    Route::get('/peraturan/edit/{id}', 'Peraturan@edit');
    Route::post('/peraturan/update', 'Peraturan@update');
    Route::delete('/peraturan/delete/{id}', 'Peraturan@delete');

    // BASIS DATA
    Route::get('/basisData', 'BasisData@index');
    Route::post('/basisData/store', 'BasisData@store');
    Route::get('/basisData/edit/{id}', 'BasisData@edit');
    Route::post('/basisData/update', 'BasisData@update');
    Route::delete('/basisData/delete/{id}', 'BasisData@delete');

    // KONTAK
    Route::get('/kontak', 'Kontak@index');
    Route::post('/kontak/store', 'Kontak@store');
});