<?php

use App\Http\Controllers\SSO\SSOController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
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
    return view('welcome');
});
Route::get("/sso/login", [SSOController::class, 'getLogin'])->name("sso.login");
Route::get("/callback", [SSOController::class, 'getCallback'])->name("sso.callback");
Route::get("/sso/connect", [SSOController::class, 'connectUser'])->name("sso.connect");

Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
    Route::post('/store', [TransactionController::class, 'store'])->name('store');
    Route::post('/get', [TransactionController::class, 'index'])->name('get');
    Route::post('/show', [TransactionController::class, 'show'])->name('show');
    Route::get('/bank', [TransactionController::class, 'bank'])->name('bank');
    Route::get('/admin', [TransactionController::class, 'admin'])->name('admin');
    Route::get('/cleansing', [TransactionController::class, 'cleansing'])->name('cleansing');
    Route::get('/token', [TransactionController::class, 'token'])->name('token');
    Route::post('/refresh-token', [TransactionController::class, 'refresh_token'])->name('refresh_token');
    Route::get('/client-info', [TransactionController::class, 'client_info'])->name('client_info');




});
Auth::routes(['register' => false, 'reset' => false ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
