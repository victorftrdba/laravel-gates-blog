<?php

use Illuminate\Support\Facades\Route;
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

Route::group(['middleware' => ['auth'], 'prefix' => '/admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::get('/roles', [RolesController::class, 'index'])->name('admin.roles.index');
    Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
});