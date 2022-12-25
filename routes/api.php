<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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

Route::controller(ProdutoController::class)
->prefix('/v1/produtos')
->group(function(){     
    Route::get('/',  'index');
    Route::get('/{id}', 'findById');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
