<?php

use App\Http\Controllers\CoordinateController;
use App\Http\Controllers\ThreeWordsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
   'middleware'=>'auth:sanctum',
   'name'=>'three.words',
   'as'=>'three.words.'
],function (){

    Route::get('/', [ThreeWordsController::class,'index'])
        ->name('index');

    Route::get('/{geo}',[ThreeWordsController::class,'show'])
        ->name('show');

    Route::put('/',[ThreeWordsController::class,'create'])
        ->name('create');

    Route::patch('/{geo}',[ThreeWordsController::class,'update'])
        ->name('update');

    Route::delete('/{geo}',[ThreeWordsController::class,'delete'])
        ->name('delete');

    Route::post('/coordinates',[CoordinateController::class,'show'])
        ->name('coordinates.show');

    Route::post('/grid',[\App\Http\Controllers\GridController::class,'show'])
        ->name('grid.show');

});
