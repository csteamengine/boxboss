<?php

use App\Http\Controllers\Backend\BoxController;
use App\Http\Controllers\Backend\InviteController;

Route::group([
    'namespace' => 'Boxes',
    'middleware' => ['featureflags:box_management']], function () {

    Route::get('boxes', [BoxController::class, 'index'])->name('boxes.index');
    Route::get('boxes/create', [BoxController::class, 'create'])->name('boxes.create')->middleware('can:create');
    Route::post('boxes', [BoxController::class, 'store'])->name('boxes.store')->middleware('can:create');

    Route::group(['prefix' => 'boxes/{box}', 'middleware' => ['featureflags:box_management']], function () {
        Route::get('view', [BoxController::class, 'view'])->name('boxes.view')->middleware('can:view,box');
        Route::get('edit', [BoxController::class, 'edit'])->name('boxes.edit')->middleware('can:edit,box');
        Route::patch('/', [BoxController::class, 'update'])->name('boxes.update')->middleware('can:update,box');
        Route::delete('/', [BoxController::class, 'destroy'])->name('boxes.destroy')->middleware('can:destroy,box');

        //TODO decide on update/edit/view permission here
        Route::group(['prefix' => 'invites/', 'middleware' => ['featureflags:invite_management', 'can:update,box']], function(){
            Route::post('/sendInvite', [InviteController::class, 'sendInvite'])->name('boxes.invites.send');
            Route::post('/sendMemberInvite', [InviteController::class, 'sendMemberInvite'])->name('boxes.invites.sendMemberInvite');
            Route::post('{invite}/delete', [InviteController::class, 'deleteInvite'])->name('boxes.invites.delete')->middleware('can:delete,invite');
        });

        Route::group(['prefix' => 'requests', 'as' => 'requests.', 'middleware' => ['featureflags:request_management', 'can:edit,box']], function(){
            Route::get('{memRequest}/accept', [BoxController::class, 'acceptRequest'])->name('accept');
            Route::get('{memRequest}/decline', [BoxController::class, 'declineRequest'])->name('decline');
        });

        Route::group(['prefix' => 'staff', 'as', 'staff.', 'middleware' => [ 'featureflags:staff_management','can:edit,box']], function(){
            Route::post('removeCoach/{user}', [BoxController::class, 'removeCoach'])->name('boxes.staff.removeCoach');
            Route::post('removeAdmin/{user}', [BoxController::class, 'removeAdmin'])->name('boxes.staff.removeAdmin');
            Route::post('removeOwner/{user}', [BoxController::class, 'removeOwner'])->name('boxes.staff.removeOwner');
        });

        Route::group(['prefix' => 'members', 'as', 'members.', 'middleware' => ['featureflags:member_management','can:view,box']], function(){
            Route::post('removeMember/{user}', [BoxController::class, 'removeMember'])->name('boxes.members.removeMember');
            Route::post('inviteMember', [BoxController::class, 'inviteMember'])->name('boxes.members.invite');
        });
    });

});

Route::group([ 'middleware' => 'featureflags:active_box'], function () {
    Route::post('updateActiveBox', [BoxController::class, 'updateActiveBox'])->name('updateActiveBox');
});
