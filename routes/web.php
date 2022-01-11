<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', [LoginController::class, 'index'])->name('auth.login.index');

Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('auth.login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.login.logout');

Route::group(['middleware' => ['auth'], 'prefix' => '/admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::get('/roles', [RolesController::class, 'index'])->name('admin.roles.index');
    Route::post('/roles', [RolesController::class, 'store'])->name('admin.roles.store');
    Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
    Route::put('/roles/edit/{id}', [RolesController::class, 'update'])->name('admin.roles.update');
    Route::delete('/roles/delete/{id}', [RolesController::class, 'delete'])->name('admin.roles.delete');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/users/edit/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
});
