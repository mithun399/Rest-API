<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyapi;
use App\Http\Controllers\usercontroller;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('insert',[dummyapi::class,'insertData']);

    });
Route::post('data',[dummyapi::class,'getData']);
Route::put('update',[dummyapi::class,'update']);
Route::get('search/{name}',[dummyapi::class,'search']);
Route::delete('delete/{id}',[dummyapi::class,'delete']);
Route::post('save',[dummyapi::class,'testData']);
Route::post("login",[usercontroller::class,'index']);
