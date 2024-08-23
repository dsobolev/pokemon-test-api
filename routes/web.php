<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

/* accept only AJAX calls for these two - custom middleware with isXMLRequest() */
Route::get('/api/pokemons/', [PokemonController::class, "all"]);
Route::get('/api/pokemons/{id}', [PokemonController::class, "single"])
    ->where('id', '[A-Za-z0-9]+');

Route::get('/{vue_capture?}', function () {
    return view('index');
})->where('vue_capture', '[\/\w\.-]*');
