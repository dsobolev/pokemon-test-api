<?php

namespace App\Http\Controllers;

use App\Exceptions\DataNotRetrievedException;
use App\Services\PokemonAPIService;
use App\Services\PokemonItemExtractor;
use App\Services\PokemonProfileExtractor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PokemonController
{
    public function __construct(
        private PokemonAPIService $pokemonApi
    ) { }

    public function all(PokemonItemExtractor $dataExtractor): JsonResponse
    {
        $res = [];

        try {
            $response = $this->pokemonApi->getAll();
        } catch (DataNotRetrievedException $e) {
            return response()->json([
                'status' => 'fail',
            ]);
        }

        $res['status'] = 'ok';
        $res['pokemons'] = [];
        $pokemons = $response['results'];

        foreach ($pokemons as $pokemon) {
            $data = $dataExtractor->extract($pokemon);

            $res['pokemons'][] = [
                'id' => $data->id,
                'name' => $data->name,
            ];
        }

        return response()->json($res);
    }

    public function single(string $id, PokemonProfileExtractor $profileExtractor): JsonResponse
    {
        $res = [];

        try {
            $response = $this->pokemonApi->getByIdOrName($id);
        } catch (DataNotRetrievedException $e) {
            response->json([
                'status' => 'fail',
            ]);
        }
        $res['status'] = 'ok';

        $profile = $profileExtractor->extract($response);
        $res['profile'] = (array) $profile;

        return response()->json($res);
    }
}
