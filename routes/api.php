<?php

use Twyco\ImageSystem\Http\Controllers\Api\ImageController;
use Illuminate\Support\Facades\Route;
use Twyco\ImageSystem\Http\Middleware\ImageMiddleware;

Route::middleware([ImageMiddleware::class])
    ->prefix('image-system')
    ->name('image-system.')
    ->group(function () {
        Route::get('/paginate', [ImageController::class, 'paginate'])->name('paginate');
});