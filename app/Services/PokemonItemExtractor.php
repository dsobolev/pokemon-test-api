<?php
namespace App\Services;

use App\DTO\PokemonItem;

class PokemonItemExtractor implements IDataExtractor
{
    public function extract(array $data): PokemonItem
    {
        $name = $data['name'];

        $subUrl = rtrim($data['url'], '/');
        $idPos = strrpos($subUrl, '/');
        $id = (int) substr($subUrl, $idPos + 1);

        return new PokemonItem($id, $name);
    }
}
