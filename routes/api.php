<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/pets', 'PetController@index');
Route::post('/pets', 'PetController@store');
Route::delete('/pets/{id}', 'PetController@destroy');

Route::get('/atendimentos', 'AtendimentoController@index');
Route::post('/atendimentos', 'AtendimentoController@store');


