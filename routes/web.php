<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::group(['prefix' => 'setting/user', 'as' => 'user.'], function () {
       Route::get('/', [UserController::class, 'index'])->name('index'); 
       Route::get('/data', [UserController::class, 'getData'])->name('data');
       Route::get('/edit', [UserController::class, 'edit'])->name('edit');
    });
    Route::group(['prefix' => 'setting/roles', 'as' => 'role.'], function () {
       Route::get('/', [RoleController::class, 'index'])->name('index'); 
       Route::post('/store', [RoleController::class, 'store'])->name('store');
       Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
       Route::delete('/{id}', [RoleController::class, 'delete'])->name('delete');
       Route::get('/permission/{id}', [RoleController::class, 'permission'])->name('permission');
       Route::post('/permission/store', [RoleController::class, 'permissionStore'])->name('permission.store');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
