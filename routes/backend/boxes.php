<?php

use App\Http\Controllers\Backend\BoxController;

Route::group([
    'namespace' => 'Boxes',
    'middleware' => 'featureflags:box_management'], function () {

    Route::get('boxes', [BoxController::class, 'index'])->name('boxes.index');
    Route::get('boxes/create', [BoxController::class, 'create'])->name('boxes.create');
    Route::post('boxes', [BoxController::class, 'store'])->name('boxes.store');

    Route::group(['prefix' => 'boxes/{box}'], function () {
        Route::get('view', [BoxController::class, 'view'])->name('boxes.view');
        Route::get('edit', [BoxController::class, 'edit'])->name('boxes.edit');
        Route::patch('/', [BoxController::class, 'update'])->name('boxes.update');
        Route::delete('/', [BoxController::class, 'destroy'])->name('boxes.destroy');
    });
});

Route::group([ 'middleware' => 'featureflags:active_box'], function () {
    Route::post('updateActiveBox', [BoxController::class, 'updateActiveBox'])->name('updateActiveBox');
});
