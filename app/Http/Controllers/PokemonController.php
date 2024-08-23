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

    public function all(?int $page = 1): JsonResponse
    {
        $res = [];

        try {
            $response = $this->pokemonApi->getAllPaged($page);
        } catch (DataNotRetrievedException $e) {
            response->json([
                'status' => 'fail',
            ]);
        }

        $res['status'] = 'ok';
        $res['count'] = $response['count'];
        $pokemons = $response['results'];

        foreach ($pokemons as $pokemon) {
            $subUrl = rtrim($pokemon['url'], '/');
            $idPos = strrpos($subUrl, '/');
            $id = (int) substr($subUrl, $idPos + 1);

            $res[] = [
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
        $res['data'] = ProfileDataExtractor::extract($response)
        */
        $res['data'] = [
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
