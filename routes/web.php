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
Route::get('/123ABCXYZ', [AuthController::class, 'viewRegister'])->name('register');
Route::post('/123ABCXYZ', [AuthController::class, 'adminRegister'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/addMedicine', [HomeController::class, 'addMedicine'])->name('medicine');
Route::get('/medPending/{id}', [HomeController::class, 'medPending'])->name('medicine');
Route::get('/medPlay/{id}', [HomeController::class, 'medPlay'])->name('medicine');
Route::get('/medDelete/{id}', [HomeController::class, 'medDelete'])->name('medicine');
Route::get('/medDetails/{id}', [HomeController::class, 'medDetails'])->name('medicine');


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
