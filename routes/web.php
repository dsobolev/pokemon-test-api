<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/api/pokemons/{page?}', [PokemonController::class, "all"]);
