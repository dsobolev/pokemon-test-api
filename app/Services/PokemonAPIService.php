<?php

namespace App\Services;

use App\Exceptions\DataNotRetrievedException;
use Illuminate\Support\Facades\Http;

class PokemonAPIService
{
    private const POKEMON_ENDPOINT = 'pokemon';

    public function __construct()
    {
        $this->baseUrl = config('app.pokemonapi.url');
    }

    public function getAll(): array
    {
        $endpoint = self::POKEMON_ENDPOINT;

        // limit here is done to omit default paging
        $responce = Http::get("{$this->baseUrl}/{$endpoint}/?limit=4000");

        if (!$responce->ok()) {
            throw new DataNotRetrievedException('Pokemons info could not be retrieved');
        }

        return $responce->json();
    }

    public function getByIdOrName(string $id): array
    {
        $endpoint = self::POKEMON_ENDPOINT;

        $responce = Http::get("{$this->baseUrl}/{$endpoint}/{$id}");

        if (!$responce->ok()) {
            throw new DataNotRetrievedException('Pokemon profile could not be retrieved');
        }

        return $responce->json();
    }

    /*
    Cache is not configured. But if so, it could be good to cache responses using URIs as keys.
    Cached for 24 hours.

    private function getCached($uri) {
        $result = Cache::remember($uri, 24 * 60 * 60, function () {
            return Http::get("{$this->baseUrl}/{$uri});
        });

        return $result;
    }

    Then all public methods could be like:

    getByIdOrName
    ...
    $uri = "$endpoint/$id";
    $response = getCached($uri);
    ...
    */
}
