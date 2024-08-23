<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;



Route::get('/hello-world', function () {
    return 'hello world';
});

Route::get('/',fn() => view(view: 'index'));
Route::get('/curriculum',fn() => view(view: 'curriculum'));

// 世界の時間
Route::get('/world-time', [UtilityController::class, 'worldTime']);

// おみくじ
Route::get('/omikuji', [GameController::class, 'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [GameController::class, 'montyHall']);