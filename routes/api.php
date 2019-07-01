<?php

use Illuminate\Http\Request;

use App\Imovel;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categorias', 'ControladorCategoria@indexJson');
Route::get('/subcategorias', 'ControladorSubcategoria@indexJson');
Route::get('/tipos', 'ControladorTipo@indexJson');

Route::resource('/produtos', 'ControladorProduto');
Route::resource('/imoveis', 'ControladorImovel');