<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SikmController;
use App\Http\Controllers\UkmController;

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
    if (auth()->check() && auth()->user()->role === 1) {
        $users = DB::table('users')
            ->select('*')
            ->where('role', 0)
            ->get();   
        return view('user.admin.dashboard', compact('users'));
    } else{
        abort(403);
    }
});

Route::get('/dashboarduser', function () {
    if (auth()->check() && auth()->user()->role === 0) {
        return view('user.editor.dashboard');
    } else{
        abort(403);
    }
});

Route::get('/editprofukm', function() {
    return view('user.editor.profilukm');
});

Route::get('/editkontakukm', function() {
    return view('user.editor.kontakukm');
});

Route::get('/editberitaukm', function() {
    return view('user.editor.beritaukm');
});

Route::get('sikm/login', [SikmController::class, 'login'])->name('login')->middleware('guest');
Route::post('sikm/login', [SikmController::class, 'authenticate']);
Route::post('sikm/logout', [SikmController::class, 'logout'])->name('logout');

Route::get('sikm/register', [SikmController::class, 'register'])->middleware('guest');
Route::post('sikm/register', [SikmController::class, 'store'])->name('store');

Route::get('/ukm', [UkmController::class, 'ukm']);
Route::get('/berita', [UkmController::class, 'berita']);