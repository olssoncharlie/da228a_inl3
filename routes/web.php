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

Route::get('/', function () {
    return view('welcome');
});

# TESTAR FÖR ATT SE SÅ HEADER OCH FOOTER FUNGERAR
Route::get('/test', function () {
    return view('test', [
        "title" => "TESTAR"
    ]);
});