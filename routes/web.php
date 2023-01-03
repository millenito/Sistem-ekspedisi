<?php

use App\Http\Controllers\Home;
use Laravolt\Platform\Enums\Permission;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\Password\Generate;
use App\Http\Controllers\User\Password\PasswordController;
use App\Http\Controllers\User\Password\Reset;
use App\Http\Controllers\CNPosController;
use App\Http\Controllers\TrackingController;

Route::redirect('/', 'auth/login');

Route::middleware(['auth', 'verified'])
    ->group(
        function () {
            Route::get('/home', Home::class)->name('home');

            Route::middleware('can:'.Permission::MANAGE_USER)
                ->group(
                    function () {
                        Route::resource('users', UserController::class)->except('show');
                        Route::resource('account', AccountController::class)->only('edit', 'update');
                        Route::resource('password', PasswordController::class)->only('edit');
                        Route::post('password/{id}/reset', Reset::class)->name('password.reset');
                        Route::post('password/{id}/generate', Generate::class)->name('password.generate');

                        Route::resource('pos', CNPosController::class)->only('create','store');
                        Route::get('pos/success', [CNPosController::class, 'success'])->name('pos.success');
                        Route::post('pos/getprice', [CNPosController::class, 'getprice'])->name('pos.getprice');

                        Route::get('tracking/index', [TrackingController::class, 'index'])->name('tracking');
                        Route::post('tracking/getlaststatus', [TrackingController::class, 'getlaststatus'])->name('tracking.getlaststatus');
                    }
            );
        }
    );

include __DIR__.'/auth.php';
include __DIR__.'/my.php';
