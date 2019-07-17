<?php

use Illuminate\Http\Request;

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



Route::get('product', 'ProductController@index');
Route::get('product/{id}', 'ProductController@index');
Route::post('register', 'AuthController@register');
Route::post('auth/Login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['middleware' => ['jwt.auth', 'auth.role:admin']], function() {
    Route::post('news/create', 'NewsController@create');
});



Route::group(['middleware' => ['auth', 'role:Admin']], function () {

});


//Route::get('products', ['middleware' => 'auth.role:admin,user', 'uses' => 'ProductController@index', 'as' => 'products']);