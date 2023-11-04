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

Route::delete('/dashboard/{name}', function ($name) {
    if (auth()->check() && auth()->user()->role === 1) {
    DB::table('users')->where('name', $name)->delete();
    return redirect('/dashboard')->with('success', 'Registration deleted successfully');
}});

Route::put('/dashboard/{name}/valid', function ($name) {
    if (auth()->check() && auth()->user()->role === 1) {
    DB::table('users')
        ->where('name', $name)
        ->update(['is_editor' => '1']);
    return redirect('/dashboard')->with('success', 'Registration status updated successfully');
}});

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
    if (auth()->user()->role === 0) {
        return view('user.editor.dashboard');
    } else{
        abort(403);
    }
})->middleware('auth');

Route::get('/editprofukm', function() {
    if (auth()->user()->role === 1) {
    return view('user.editor.profilukm');
    } else{
        abort(403);
    }
})->middleware('auth');

Route::get('/editkontakukm', function() {
    if (auth()->user()->role === 1) {
        return view('user.editor.kontakukm');
        } else{
            abort(403);
        }
})->middleware('auth');

Route::get('/editberitaukm', function() {
    if (auth()->user()->role === 1) {
        return view('user.editor.beritaukm');
        } else{
            abort(403);
        }
})->middleware('auth');

Route::get('sikm/login', [SikmController::class, 'login'])->name('login')->middleware('guest');
Route::post('sikm/login', [SikmController::class, 'authenticate']);
Route::post('sikm/logout', [SikmController::class, 'logout'])->name('logout');

Route::get('sikm/register', [SikmController::class, 'register'])->middleware('guest');
Route::post('sikm/register', [SikmController::class, 'store'])->name('store');

Route::get('/ukm', [UkmController::class, 'ukm']);
Route::get('/berita', [UkmController::class, 'berita']);

Route::post('/dashboard/update-profile', [SikmController::class, 'updateProfile'])->middleware('auth');

Route::get('/dashboard/{name}', [SikmController::class, 'detail'])->name('user.detail');