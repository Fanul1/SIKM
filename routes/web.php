<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SikmController;
use App\Http\Controllers\LoginRegController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardUserController;
use Providers\AuthServiceProvider;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes /loginare loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('sikm', [SikmController::class, 'home']);
Route::get('/', [SikmController::class, 'home']);

Route::delete('/dashboard/{name}', [DashboardAdminController::class, 'delete']);

Route::put('/dashboard/{name}/valid', [DashboardAdminController::class, 'validasi']);

Route::get('/dashboard', [DashboardAdminController::class, 'dashadmin']);

Route::get('/dashboarduser', [DashboardUserController::class, 'dashboarduser'])->middleware('auth');

Route::get('/editprofukm', [DashboardUserController::class, 'editprofukm']);

Route::get('/editkontakukm', [DashboardUserController::class, 'editkontakukm']);

Route::get('/editberitaukm', [DashboardUserController::class, 'editberitaukm']);
Route::post('/addberitaukm', [DashboardUserController::class, 'storeberita']);
Route::get('/editberita/{id}', [DashboardUserController::class, 'showDetail'])->name('berita.detail');
Route::get('/editberita/{id}/edit', [DashboardUserController::class, 'editBerita'])->name('berita.edit');
Route::put('/editberita/{id}', [DashboardUserController::class, 'update'])->name('berita.update');
Route::delete('/editberita/{id}', [DashboardUserController::class, 'deleteBerita'])->name('berita.delete');


Route::post('/createukm', [DashboardUserController::class, 'create']);

Route::get('sikm/login', [LoginRegController::class, 'login'])->name('login')->middleware('guest');
Route::post('sikm/login', [LoginRegController::class, 'authenticate']);
Route::post('sikm/logout', [LoginRegController::class, 'logout'])->name('logout');

Route::get('sikm/register', [LoginRegController::class, 'register'])->middleware('guest');
Route::post('sikm/register', [LoginRegController::class, 'store'])->name('store');

Route::get('/ukm', [SikmController::class, 'ukm']);
Route::get('/berita', [SikmController::class, 'berita']);

Route::post('/dashboarduser/update-profile', [DashboardUserController::class, 'updateProfile'])->middleware('auth');

Route::post('/updateukm', [DashboardUserController::class, 'updateukm']);

Route::get('/dashboard/{name}', [DashboardAdminController::class, 'detail'])->name('user.detail');

Route::delete('/deleteEditor/{user}', [DashboardAdminController::class, 'deleteEditor'])->name('deleteEditor');
Route::put('/suspendEditor/{user}', [DashboardAdminController::class, 'suspendEditor'])->name('suspendEditor');
Route::put('/unsuspendEditor/{user}', [DashboardAdminController::class, 'unsuspendEditor'])->name('unsuspendEditor');

Route::delete('/hapusukm/{id}', [DashboardAdminController::class, 'hapusukm'])->name('hapusukm');