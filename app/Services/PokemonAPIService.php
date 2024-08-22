<?php

namespace App\Services;

use App\Exceptions\DataNotRetrievedException;
use Illuminate\Support\Facades\Http;

class PokemonAPIService
{
    public function __construct()
    {
        $this->baseUrl = config('app.pokemonapi.url');
        $this->pageSize = config('app.pokemonapi.pageSize');
    }

    public function getAllPaged(int $pageNo): array
    {
        $endpoint = 'pokemon';

        if ($pageNo <= 0) {
            $pageNo = 1;
        }

        $responce = Http::get("{$this->baseUrl}/{$endpoint}/", [
            'limit' => $this->pageSize,
            'offset' => ($pageNo - 1) * $this->pageSize,
        ]);

        if (!$responce->ok()) {
            throw new DataNotRetrievedException('Pokemons info could not be retrieved');
        }

        return $responce->json();
    }
}
