<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Subcategory;
use App\Article;

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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api){
    $api->get('users/{count?}', 'App\Http\Controllers\UserController@getUsers')
    ->where('count', '[0-9]+');

    $api->get('ok', function () {
        return 'It is ok';
    });

    $api->get('subcategory', 'App\Http\Controllers\SubcategoryController@index');
});
