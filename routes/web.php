<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/api/pokemons/{page?}', [PokemonController::class, "all"]);
Route::get('/api/pokemons/profile/{id}', [PokemonController::class, "single"])
    ->where('id', '[A-Za-z0-9]+');
