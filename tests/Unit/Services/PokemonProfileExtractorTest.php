<?php
namespace Tests\Services;

use App\DTO\PokemonProfile;
use App\Services\PokemonProfileExtractor;
use PHPUnit\Framework\TestCase;

class PokemonProfileExtractorTest extends TestCase
{
    private array $response = [
        "name" => "nidoran-m",
        "height" => 5,
        "weight" => 90,
        "sprites" => [
            "other" => [
                "official-artwork" => [
                    "front_default" => "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/32.png",
                    "front_shiny" => "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/32.png",
                ]
            ]
        ],
        "species" => [
            "name" => "nidoran-m",
            "url" => "https://pokeapi.co/api/v2/pokemon-species/32/",
        ],
        "abilities" => [["ability"=>["name"=>"poison-point","url"=>"https=>//pokeapi.co/api/v2/ability/38/"],"is_hidden"=>false,"slot"=>1],["ability"=>["name"=>"rivalry","url"=>"https=>//pokeapi.co/api/v2/ability/79/"],"is_hidden"=>false,"slot"=>2],["ability"=>["name"=>"hustle","url"=>"https://pokeapi.co/api/v2/ability/55/"],"is_hidden"=>true,"slot"=>3]],
    ];

    public function test_profile_has_name(): void
    {
        $result = $this->extractionResult();
        $this->assertSame($this->response['name'], $result->name);
    }

    public function test_profile_has_width_and_height(): void
    {
        $result = $this->extractionResult();
        $this->assertSame($this->response['weight'], $result->weight);
        $this->assertSame($this->response['height'], $result->height);
    }

    public function test_profile_has_image_link(): void
    {
        $result = $this->extractionResult();
        $this->assertSame($this->response['sprites']['other']['official-artwork']['front_default'], $result->img);
    }

    public function test_profile_has_species(): void
    {
        $result = $this->extractionResult();
        $this->assertSame($this->response['species']['name'], $result->species);
    }

    public function test_profile_has_list_of_abilities(): void
    {
        $result = $this->extractionResult();
        $this->assertCount(count($this->response['abilities']), $result->abilities);
        $this->assertContains($this->response['abilities'][0]['ability']['name'], $result->abilities);
    }

    private function extractionResult(): PokemonProfile
    {
        $extractor = new PokemonProfileExtractor();

        return $extractor->extract($this->response);
    }
}
