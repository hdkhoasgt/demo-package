<?php

use Illuminate\Support\Facades\Route;
use Hdkhoasgt\DemoPackage\Http\Controllers\MessageLogController;

Route::get('/message_logs/hello/{name?}', [MessageLogController::class, 'hello'])
    ->name('message_logs.hello')
    ->middleware([\Hdkhoasgt\DemoPackage\Http\Middleware\SaveMessageLog::class])
;
Route::get('/message_logs/bye/{name?}', [MessageLogController::class, 'bye'])
    ->name('message_logs.bye')
    ->middleware([\Hdkhoasgt\DemoPackage\Http\Middleware\SaveMessageLog::class])
;
