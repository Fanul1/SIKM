<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SikmController;

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

Route::get('/dashboard', function () {
    return view('user.admin.dashboard');
});

Route::get('/dashboarduser', function() {
    return view('user.editor.dashboard');
});

Route::get('sikm/login', [SikmController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [SikmController::class, 'authenticate']);
Route::post('/logout', [SikmController::class, 'logout']);

Route::get('sikm/register', [SikmController::class, 'register'])->middleware('guest');
Route::post('sikm/register', [SikmController::class, 'store']);
