<?php
namespace App\DTO;

class PokemonProfile
{
    public function __construct(
        public string $name = '',
        public string $img = '',
        public int $weight = 0,
        public int $height = 0,
        public string $species = '',
        public array $abilities = []
    ) { }
}
