<?php
namespace App\Services;

use App\DTO\PokemonItem;

interface IDataExtractor
{
    public function extract(array $data): PokemonItem;
}
