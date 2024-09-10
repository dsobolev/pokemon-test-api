<?php
namespace App\Services;

use App\DTO\PokemonProfile;

class PokemonProfileExtractor implements IDataExtractor
{
    public function extract(array $data): PokemonProfile
    {
        $profile = new PokemonProfile();

        $profile->name = $data['name'];
        $profile->weight = $data['weight'];
        $profile->height = $data['height'];

        $profile->img = $data['sprites']['other']['official-artwork']['front_default'];

        $profile->species = $data['species']['name'];
        $profile->abilities = array_map(
            fn($ability) => $ability['ability']['name'],
            $data['abilities']
        );

        return $profile;
    }
}
