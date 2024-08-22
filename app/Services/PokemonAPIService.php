<?php

namespace App\Services;

use App\Exceptions\DataNotRetrievedException;
use Illuminate\Support\Facades\Http;

class PokemonAPIService
{
    public function getAllPaged(int $pageNo): array
    {
        $baseUrl = 'https://pokeapi.co/api/v2';
        $perPage = 30;

        $endpoint = 'pokemon';

        if ($pageNo <= 0) {
            $pageNo = 1;
        }

        $responce = Http::get("${baseUrl}/${endpoint}/", [
            'limit' => $perPage,
            'offset' => ($pageNo - 1) * $perPage,
        ]);

        if (!$responce->ok()) {
            throw new DataNotRetrievedException('Pokemons info could not be retrieved');
        }

        return $responce->json();
    }
}
