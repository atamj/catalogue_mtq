<?php

use App\Http\Controllers\CategoryController;
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
/** Home*/
Route::get('/', function () {
    return view('index');
});
/** Catalogue, vue temporaire*/
Route::get('/cata', function () {
    return view('catalogue');
});

/** Page catégorie*/
Route::get(
    '/{category}',
    [CategoryController::class, 'index']
);
/** Show*/
Route::get(
    '/product/{id}',
    [CategoryController::class, 'show']
);
