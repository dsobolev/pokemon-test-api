<?php
namespace App\DTO;

class PokemonItem
{
    public function __construct(
        public int $id,
        public string $name
    ) { }
}
