<?php

use App\Http\Controllers\CustomersController;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.user');
});



Route::group(['middleware' => [], 'prefix' => '', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('test', 'TestController@index')->name('test');

    // Route::get('/test', function () {
    //     return CustomerResource::collection(Customer::all());
    // });

    Route::get('login', 'LoginController@index')->name('login');
    Route::post('login', 'LoginController@loginAction')->name('login.post-login');

    Route::get('logout', 'LoginController@logoutAction')->name('logout');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers'], function () {
        Route::get('/', 'UserController@index')->name('admin.user');
    });

    Route::resource('customers', CustomersController::class);
});



