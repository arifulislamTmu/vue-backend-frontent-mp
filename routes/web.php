<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
    // $users = User::get();
    // return $users;
});

Route::get('/api/users', [UserController::class, 'index']);
Route::post('/api/user/create', [UserController::class, 'storeUser']);



Route::get('{any}', ApplicationController::class)->where('any','.*');

