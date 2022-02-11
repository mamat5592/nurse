<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'can:view-admin-panel'])->group(function(){
    Route::get('/', function () {
        return view('layouts.admin-panel');
    })->name('admin-panel');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});