<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/list');
});

//Route::get('/list', 'UserController@listPage');
Route::get('/list', [UserController::class, 'listPage']);
Route::get('/list-user', [UserController::class, 'getList']);



