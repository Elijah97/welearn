<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

Auth::routes();
Route::match(['get', 'post'], '/register', function () {
    return redirect('/');
});

Route::get('/', [AuthController::class, 'index']);

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/', [AuthController::class, 'index']);
Route::get('/signup', [AuthController::class, 'viewRegister'])->name('register');
Route::post('/signup', [AuthController::class, 'adminRegister'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/addContent', [HomeController::class, 'addContent'])->name('content');
Route::get('/contentPending/{id}', [HomeController::class, 'contentPending'])->name('content');
Route::get('/contentPlay/{id}', [HomeController::class, 'contentPlay'])->name('content');
Route::get('/contentDelete/{id}', [HomeController::class, 'contentDelete'])->name('content');
Route::get('/contentDetails/{id}', [HomeController::class, 'contentDetails'])->name('content');


Route::get('/admin', [HomeController::class, 'getAdmin'])->name('admin');
Route::post('/addAdmin', [HomeController::class, 'addAdmin'])->name('admin');
Route::get('/adminPlay/{id}', [HomeController::class, 'adminPlay'])->name('admin');
Route::get('/adminPending/{id}', [HomeController::class, 'adminPending'])->name('admin');
Route::get('/adminDelete/{id}', [HomeController::class, 'adminDelete'])->name('admin');


Route::get('/pharmacist', [HomeController::class, 'getPharmacist'])->name('pharmacist');
Route::post('/addPharmacist', [HomeController::class, 'addPharmacist'])->name('pharmacist');
Route::get('/pharPlay/{id}', [HomeController::class, 'pharPlay'])->name('pharmacist');
Route::get('/pharPending/{id}', [HomeController::class, 'pharPending'])->name('pharmacist');
Route::get('/pharDelete/{id}', [HomeController::class, 'pharDelete'])->name('pharmacist');
