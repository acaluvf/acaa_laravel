<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;


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
    return view('template/home');
});

route::get('/register', [loginController::class, 'register'])->name('register');
route::post('/simpanregister', [loginController::class, 'simpanregister'])->name('simpanregister');
route::get('/login', [loginController::class, 'halamanlogin'])->name('login');
route::post('/postlogin', [loginController::class, 'postlogin'])->name('postlogin');
route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['auth','ceklevel:admin,karyawan']], function () {
    route::get('template/home', [homeController::class, 'index'])->name('home');
});


