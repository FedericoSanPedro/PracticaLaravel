<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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
/*
Pequeña practica
Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return "Welcome to users";
});

Route::get('/users', function () {
    return ['PHP','HTML','Laravel'];
});

Route::get('/users', function () {
    return response()->json([
        'name' => 'Dary',
        'course' => 'Laravel'
    ]);
});

Route::get('/users', function () {
    return redirect('/');
});

Route::get('/', function () {
    return view('home');
});

*/
Route::get('/', function () {
    return view('home');
});

/*
2 formas distintas de entrar a las direcciones, usar cualquiera
*/

Route::get('/products',
 [ProductsController::class, 'index'])->name('products');

/*
Igual que el de arriba, simplemente agrege una palabra mas a la URL
Route::get('/products/index', [ProductsController::class, 'index']);
*/
/*
Route::get('/products', 'App\Http\Controllers\ProductsController@index');

//pattern is integer
Route::get('/products/{id}', 
[ProductsController::class, 'show'])->where('id','[0-9]+');

//pattern is string
Route::get('/products/{name}', 
[ProductsController::class, 'show'])->where('name','[a-zA-Z]+');
*/