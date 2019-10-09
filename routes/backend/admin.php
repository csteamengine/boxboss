<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Models\Facades\Feature;
// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

if(Feature::isActive('active_box')){
    Route::post('updateActiveBox', [DashboardController::class, 'updateActiveBox'])->name('updateActiveBox');
}
