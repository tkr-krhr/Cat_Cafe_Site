<?php

use Illuminate\Support\Facades\Route;


Route::get('/hello-world', function () {
    return 'hello world';
});

Route::get('/',fn() => view(view: 'index'));
Route::get('/curriculum',fn() => view(view: 'curriculum'));