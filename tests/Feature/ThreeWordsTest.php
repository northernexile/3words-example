<?php

namespace Tests\Feature;

use App\Models\GeoThreeWords;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

/**
 * Class ThreeWordsTest
 * @package Tests\Feature
 */
class ThreeWordsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @var User */
    private $user;


    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        Sanctum::actingAs($this->user);
    }

    /** @test */
    public function can_list_geo_three_words()
    {
        $geo3Words = GeoThreeWords::factory(2)->create();

        $this->assertInstanceOf(Collection::class,$geo3Words);

        $randomThreeWords = $geo3Words->random();
        $this->assertInstanceOf(GeoThreeWords::class,$randomThreeWords);

        $route = route('three.words.index');

        $response = $this->getJson($route);
        $response->assertStatus(200);
        $response->assertJsonFragment(['latitude'=>$randomThreeWords->latitude]);
        $response->assertJsonFragment(['longitude'=>$randomThreeWords->longitude]);
        $response->assertJsonFragment(['three_words'=>$randomThreeWords->three_words]);
    }
}
