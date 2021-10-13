<?php

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

    Route::get('/{geo}}',[ThreeWordsController::class,'show'])
        ->name('show');
});
