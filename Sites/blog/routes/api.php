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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//定义在api中的路由，访问的时候需要在路由前面填充api
//eg http://blog.test/api/users/1
Route::get('/users/{user}', function(App\User $user){
    return $user->email;
});
