<?php
namespace Tests\Services;

use App\Services\PokemonItemExtractor;
use PHPUnit\Framework\TestCase;

class PokemonItemExtractorTest extends TestCase
{
    private array $response = [
        'name' => 'bulbasaur',
        'url'=> 'https://pokeapi.co/api/v2/pokemon/1/', // id is 1
    ];

    public function test_result_contains_fields_needed(): void
    {
        $extractor = new PokemonItemExtractor();
        $result = $extractor->extract($this->response);

        $this->assertNotEmpty($result->id);
        $this->assertNotEmpty($result->name);
    }

    public function test_item_name_set_right(): void
    {
        $extractor = new PokemonItemExtractor();
        $result = $extractor->extract($this->response);

        $this->assertEquals($this->response['name'], $result->name);
    }

    public function test_item_id_set_right(): void
    {
        $extractor = new PokemonItemExtractor();
        $result = $extractor->extract($this->response);

        $this->assertEquals(1, $result->id);
    }
}
