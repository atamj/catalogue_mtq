<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProductController;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    phpinfo();
});
Route::get('/home', function () {
    return redirect('/admin');
});
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::resources([
    'admin/operation'   => OperationController::class,
    'admin/product'     => ProductController::class,
    'admin/client'      => ClientController::class,
]);
Route::get('admin/client-operation/{client_id}/{operation_id}', [ClientController::class, 'editPivot']);
Route::put('admin/client-operation/{client_id}', [ClientController::class, 'updatePivot']);

Route::get('admin/category', [OperationController::class, 'indexCategories']);
Route::get('admin/category/{id}', [OperationController::class, 'editCategories']);
Route::put('admin/category/{id}', [OperationController::class, 'updateCategories']);

Route::get('/admin/seed', function () {

    $users = \App\Models\User::all();
    if (count($users) == 0) {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'guru@latitudesud.gp',
            'password' => Hash::make('p1]Q[Bf4]=4B&SXBH^*'),
            'admin' => 1,
        ]);
        return redirect('/login');
    } else {
        return redirect('/login');
    }

});

/** Home*/
Route::get('/', function () {

    if (env("APP_VERSION") == "2") {

        /** On récupère l'url de base pour identifier le client*/
        $client_url = \request()->server->get('HTTP_HOST');
        /** Local*/
        if (env("APP_ENV") == 'local') {

            /** On récupère les info client selon l'url*/
            $client = Client::where('url', env('APP_URL'))->first();

        } /** Production*/
        else {

            /** On récupère les info client selon l'url*/
            $client = Client::where('url', $client_url)->first();

        }

        /** Récupère les info de l'opération selon l'url*/
        $operation = $client->operations()->get()->last();

        /** On récupère toutes les catégories de cette opération*/
        $categories = $operation->categories()->get();

        return redirect($operation->shortname);
    }

});

Route::get('/{ope}', function ($ope) {

    /**
     * Catalogue V2
     */
    setlocale(LC_ALL, 'fr_FR');

    if (env("APP_VERSION") == "2") {

        /** Récupère les info de l'opération selon l'url*/
        $operation = \App\Models\Operation::where('shortname', $ope)->first();

        /** On récupère l'url de base pour identifier le client*/
        $client_url = \request()->server->get('HTTP_HOST');

        /** Local*/
        if (env("APP_ENV") == 'local') {

            /** On récupère les info client selon l'url*/
            $client = $operation->clients()->where('url', env('APP_URL'))->first();

        } /** Production*/
        else {

            /** On récupère les info client selon l'url*/
            $client = $operation->clients()->where('url', $client_url)->first();

        }

        /** On récupère toutes les catégories de cette opération*/
        $categories = $operation->categories()->get();
        $pivot = $client->operations->find($operation->id)->pivot;
        $pivot = $pivot->find($pivot->id);

        return view('index', compact('client', 'operation', 'categories', 'pivot'));

    } else {

        $menu = json_decode(\Illuminate\Support\Facades\Storage::get('public/' . $ope . '/menu.json'));
        return view('index', compact('menu', 'ope'));

    }
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

