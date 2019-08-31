<?php

//use Illuminate\Http\Request;

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
Route::get('verifyUser/{verification_code}', 'AuthController@verifyUser');
Route::post('auth/Login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');
Route::post('reset1', 'AuthController@resetSendToken');
Route::post('reset2', 'AuthController@reset');
Route::get('news', 'NewsController@index');
Route::post('pay/notify', 'PaymentController@notify');
Route::get('prices', 'ProductController@getPrices');
Route::get('products/members', 'ProductController@getMembers');


Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');
//    Route::get('test', function(){
//        return response()->json(['foo'=>'bar']);
//    });
//    Route::get('/user', function (Request $request) {
//        return $request->user();
//    });
});

Route::group(['middleware' => ['jwt.auth', 'auth.role:admin']], function() {
    Route::post('news/create', 'NewsController@create');
    Route::post('news/delete/{id}', 'NewsController@delete');
    Route::post('news/update', 'NewsController@update');
    Route::post('product/update', 'ProductController@update');
});


Route::group(['middleware' => ['jwt.auth', 'auth.role:admin,user']], function() {
    Route::get('products/get', 'ProductController@get');
    Route::post('product/acceptProduct', 'ProductController@acceptProduct');
    Route::post('resetLk', 'AuthController@resetLk');
});



//Route::group(['middleware' => ['auth', 'role:Admin']], function () {
//});


//Route::get('products', ['middleware' => 'auth.role:admin,user', 'uses' => 'ProductController@index', 'as' => 'products']);