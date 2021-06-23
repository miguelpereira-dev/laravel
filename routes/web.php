<?php

use Illuminate\Support\Facades\{Auth, Route};

//Series
Route::get('/series', 'App\Http\Controllers\SeriesController@index');
Route::get('/series/criar', 'App\Http\Controllers\SeriesController@create')->name('form_criar_serie');
Route::post('/series/criar', 'App\Http\Controllers\SeriesController@store')->middleware('auth');
Route::delete('/series/{id}', 'App\Http\Controllers\SeriesController@destroy')->middleware('auth');
Route::post('/series/{id}/editName', 'App\Http\Controllers\SeriesController@editaNome')->middleware('auth');

//Temporadas
Route::get('/series/{id}/temporadas', 'App\Http\Controllers\TemporadasController@index');

//Episodios
Route::get('/temporadas/{temporada}/episodios', 'App\Http\Controllers\EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'App\Http\Controllers\EpisodiosController@assistir')->middleware('auth');

//Auth
Route::get('/entrar', 'App\Http\Controllers\AuthController@index')->name("login");
Route::post('/entrar', 'App\Http\Controllers\AuthController@entrar');
Route::get('/registrar', 'App\Http\Controllers\AuthController@create');
Route::post('/registrar', 'App\Http\Controllers\AuthController@store');
Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});
