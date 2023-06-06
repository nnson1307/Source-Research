<?php

use App\Http\Controllers\Api\AuthenController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('aws-cognito')->get('test', function () {
    // dd(auth()->guard('api')->user());
});

Route::group(['middleware' => ['api'], 'prefix' => ''], function () {
    Route::post('register', [AuthenController::class, 'register']);
});