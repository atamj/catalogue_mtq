<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
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
    $menu = json_decode(\Illuminate\Support\Facades\Storage::get('menu.json'));
    return view('index', compact('menu'));
});

/** Store Contact */
Route::post('contact',
    [ContactController::class, 'store']
);

/*Route::get('contact',
    [ContactController::class, 'get']
);*/

/** Full Catalogue */
Route::get(
    '/catalogue',
    [CategoryController::class, 'catalogue']
);

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

