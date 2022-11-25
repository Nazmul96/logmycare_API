<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//'middleware'=>'custom_auth'


Route::group(['namespace'=>'App\Http\Controllers\Api','prefix'=>'v1'], function () {
   Route::group(['middleware'=>'custom_auth'],function(){  
        Route::resource('/clients','ClientController');
        Route::resource('/todos','TodoController');
        
        Route::post('/profile/update','LoginController@profileUpdate');

        Route::get('/category','CategoryController@index');
        Route::get('/subCategory/{id}','CategoryController@subCategory');

    
   });

   Route::post('/login','LoginController@login');
        
});
