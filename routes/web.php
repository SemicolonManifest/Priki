<?php

use App\Http\Controllers\PracticesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomainPracticesController;
use App\Http\Controllers\ReferencesController;

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

Route::get('/', [HomeController::class, 'index']);


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/domain/{domainSlug}/practices/', [DomainPracticesController::class, 'index']);

Route::get('/practices/{id}', [PracticesController::class, 'show']);

Route::post('/practices/{id}/editTitle', [PracticesController::class, 'editTitle']);

Route::get('/references', [ReferencesController::class, 'show']);

Route::post('/references/create', [ReferencesController::class, 'create']);

Route::get('/domain', function () {
    return view('domain');
});

Route::get('/role', function () {
    return view('role');
});

Route::post('/domain/add', function () {

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resources([
    'references' => ReferencesController::class,
]);

require __DIR__.'/auth.php';



