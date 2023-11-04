<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SikmController;
use App\Http\Controllers\UkmController;
use Providers\AuthServiceProvider;
use Illuminate\Support\Facades\Gate;

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

Route::delete('/dashboard/{name}', function ($name) {
    if (Gate::allows('admin')) {
    DB::table('users')->where('name', $name)->delete();
    return redirect('/dashboard')->with('success', 'Account deleted successfully');
}});

Route::put('/dashboard/{name}/valid', function ($name) {
    if (Gate::allows('admin')) {
    DB::table('users')
        ->where('name', $name)
        ->update(['role' => '2']);
    return redirect('/dashboard')->with('success', 'Account approved successfully');
}});


Route::get('/dashboard', [SikmController::class, 'dashadmin']);

Route::get('/dashboarduser', function () {
    if (auth()->user()->role !== '1') {
        return view('user.editor.dashboard');
    } else{
        abort(403);
    }
})->middleware('auth');

Route::get('/editprofukm', function() {
    if (Gate::allows('editor')) {
    return view('user.editor.ukm.profilukm');
    } else{
        abort(403);
    }
});

Route::get('/editkontakukm', function() {
    if (Gate::allows('editor')) {
        return view('user.editor.ukm.kontakukm');
        } else{
            abort(403);
        }
});

Route::get('/editberitaukm', function() {
    if (Gate::allows('editor')) {
        return view('user.editor.ukm.beritaukm');
        } else{
            abort(403);
        }
});

Route::get('sikm/login', [SikmController::class, 'login'])->name('login')->middleware('guest');
Route::post('sikm/login', [SikmController::class, 'authenticate']);
Route::post('sikm/logout', [SikmController::class, 'logout'])->name('logout');

Route::get('sikm/register', [SikmController::class, 'register'])->middleware('guest');
Route::post('sikm/register', [SikmController::class, 'store'])->name('store');

Route::get('/ukm', [UkmController::class, 'ukm']);
Route::get('/berita', [UkmController::class, 'berita']);

Route::post('/dashboarduser/update-profile', [SikmController::class, 'updateProfile'])->middleware('auth');

Route::get('/dashboard/{name}', [SikmController::class, 'detail'])->name('user.detail');