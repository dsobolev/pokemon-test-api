<?php

namespace App\Http\Controllers;

use App\Exceptions\DataNotRetrievedException;
use App\Services\PokemonAPIService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PokemonController
{
    public function __construct(
        private PokemonAPIService $pokemonApi
    ) { }

    public function all(): JsonResponse
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

        /*
        This processing should go to a separate Services/PokemonDataExtractor to hobor Single Responsibility principle.

        $res['pokemons'] = PokemonDataExtractor::extract($pokemons)
        */
        foreach ($pokemons as $pokemon) {
            $subUrl = rtrim($pokemon['url'], '/');
            $idPos = strrpos($subUrl, '/');
            $id = (int) substr($subUrl, $idPos + 1);

            $res['pokemons'][] = [
                'id' => $id,
                'name' => $pokemon['name'],
            ];
        }

        return response()->json($res);
    }

    public function single(string $id): JsonResponse
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

        /*
        This piece might go to separate Services/ProfileDataExtractor

        $res['profile'] = ProfileDataExtractor::extract($response)
        */
        $res['profile'] = [
            'name' => $response['name'],
            'img' => $response['sprites']['other']['official-artwork']['front_default'],
            'height' => $response['height'],
            'weight' => $response['weight'],
            'species' => $response['species']['name'],
            'abilities' => array_map(
                fn($ability) => $ability['ability']['name'],
                $response['abilities']
            ),

        ];

        return response()->json($res);
    }
}
