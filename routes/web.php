<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomainPracticesController;

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

Route::get('/', [HomeController::class,'index']);


Route::get('/home/', [HomeController::class,'index']);

Route::get('/domain/{domainSlug}/practices/', [DomainPracticesController::class,'index']);



Route::get('/domain', function () {
    return view('domain');
});

Route::get('/role', function () {
    return view('role');
});

Route::post('/domain/add', function (){

});

Route::redirect('/teapot', '/teapot', 418);
