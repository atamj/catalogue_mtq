<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
Auth::routes();

Route::get('/home', function () {
    return redirect('/admin');
});
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::resources([
    'admin/operation'   => OperationController::class,
    'admin/product'     => ProductController::class,
    'admin/client'      => ClientController::class,
]);
Route::get('admin/client-operation/{client_id}/{operation_id}', [ClientController::class, 'editPivot']);
Route::put('admin/client-operation/{client_id}', [ClientController::class, 'updatePivot']);
Route::get('/admin/seed', function (){

    $users = \App\Models\User::all();
    if (count($users) == 0){
        DB::table('users')->insert([
            'name' => 'admin',
            'email' =>'guru@latitudesud.gp',
            'password' => Hash::make('p1]Q[Bf4]=4B&SXBH^*'),
            'admin' => 1,
        ]);
    }else{
        return redirect('/login');
    }

});

/** Home*/
Route::get('/', function (){

});

Route::get('/{ope}', function ($ope) {
    $menu = json_decode(\Illuminate\Support\Facades\Storage::get('public/'.$ope.'/menu.json'));
    return view('index', compact('menu', 'ope'));
});

/** Store Contact */
Route::post('{ope}/contact',
    [ContactController::class, 'store']
);

Route::get('{ope}/contact18647659564849',
    [ContactController::class, 'get']
);

/** Full Catalogue */
Route::get(
    '/{ope}/catalogue',
    [CategoryController::class, 'catalogue']
);

/** Page catégorie*/
Route::get(
    '/{ope}/{category}',
    [CategoryController::class, 'index']
);
/** Show*/
Route::get(
    '{ope}/product/{id}',
    [CategoryController::class, 'show']
);

