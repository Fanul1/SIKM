<?php

use Illuminate\Http\Request;
use Providers\AuthServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SikmController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\LoginRegController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Models\User;

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

Route::get('sikm', [SikmController::class, 'index']);
Route::get('/', [SikmController::class, 'index'])->name('sikm.index');
Route::get('/ukm/{id}', [SikmController::class, 'showUkm'])->name('sikm.ukm');
Route::get('/berita/{id}', [SikmController::class, 'showBerita'])->name('sikm.berita');

Route::delete('/dashboard/{name}', [DashboardAdminController::class, 'delete']);

Route::put('/dashboard/{name}/valid', [DashboardAdminController::class, 'validasi']);

Route::get('/dashboard', [DashboardAdminController::class, 'dashadmin']);

Route::get('/dashboarduser', [DashboardUserController::class, 'dashboarduser'])->middleware('auth');

Route::get('/editprofukm', [DashboardUserController::class, 'editprofukm']);

Route::get('/editkontakukm', [DashboardUserController::class, 'editkontakukm']);
Route::put('/updatekontakukm', [DashboardUserController::class, 'updatekontakukm'])->name('updatekontakukm');

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

Route::post('/dashboarduser/update-profile', [DashboardUserController::class, 'updateProfile'])->middleware('auth');

Route::post('/updateukm', [DashboardUserController::class, 'updateukm']);

Route::get('/dashboard/{name}', [DashboardAdminController::class, 'detail'])->name('user.detail');

Route::delete('/deleteEditor/{user}', [DashboardAdminController::class, 'deleteEditor'])->name('deleteEditor');
Route::put('/suspendEditor/{user}', [DashboardAdminController::class, 'suspendEditor'])->name('suspendEditor');
Route::put('/unsuspendEditor/{user}', [DashboardAdminController::class, 'unsuspendEditor'])->name('unsuspendEditor');

Route::delete('/hapusukm/{id}', [DashboardAdminController::class, 'hapusukm'])->name('hapusukm');
Route::delete('/ukm/{ukm}', [DashboardUserController::class, 'destroy'])->name('ukm.destroy');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
        
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:4|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');