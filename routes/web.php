<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/main', 'HomeController@index')->name('home');


Route::apiResource('personas','mantenimientos\PersonaController');


Route::fallback(function () {
    return redirect('/main');
});