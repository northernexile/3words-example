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
        $geo3Words = GeoThreeWords::factory(10)->create();

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

    /** @test  */
    public function can_get_specific_three_word_result_by_id()
    {
        $geo3Words = GeoThreeWords::factory(10)->create();

        $randomThreeWords = $geo3Words->random();
        $this->assertInstanceOf(GeoThreeWords::class,$randomThreeWords);

        $route = route('three.words.show',['geo'=>$randomThreeWords]);

        $response = $this->getJson($route);
        $response->assertStatus(200);
        $response->assertJsonFragment(['latitude'=>$randomThreeWords->latitude]);
        $response->assertJsonFragment(['longitude'=>$randomThreeWords->longitude]);
        $response->assertJsonFragment(['three_words'=>$randomThreeWords->three_words]);
    }

    /** @test  */
    public function can_create_geo_what_3_words_record()
    {
        $post = [
            'latitude'=>$this->faker->latitude,
            'longitude'=>$this->faker->longitude,
            'three_words'=>\implode('.',$this->faker->words(3))
        ];

        $this->assertDatabaseMissing('geo_three_words',[
            'latitude'=>$post['latitude'],
            'longitude'=>$post['longitude'],
            'three_words'=>$post['three_words']
        ]);

        $route = route('three.words.create');

        $response = $this->putJson($route,$post);

        $response->assertCreated();

        $this->assertDatabaseHas('geo_three_words',[
            'latitude'=>$post['latitude'],
            'longitude'=>$post['longitude'],
            'three_words'=>$post['three_words']
        ]);

        $response->assertJsonFragment(['latitude'=>"{$post['latitude']}"]);
        $response->assertJsonFragment(['longitude'=>"{$post['longitude']}"]);
        $response->assertJsonFragment(['three_words'=>"{$post['three_words']}"]);
    }

    /** @test  */
    public function can_update_geo_what_3_words_record()
    {
        $existing = GeoThreeWords::factory()->create();

        $post = [
            'latitude'=>$this->faker->latitude,
            'longitude'=>$this->faker->longitude,
            'three_words'=>\implode('.',$this->faker->words(3))
        ];

        $this->assertDatabaseMissing('geo_three_words',[
            'latitude'=>$post['latitude'],
            'longitude'=>$post['longitude'],
            'three_words'=>$post['three_words']
        ]);

        $route = route('three.words.update',['geo'=>$existing]);

        $response = $this->patchJson($route,$post);

        $response->assertSuccessful();

        $this->assertDatabaseHas('geo_three_words',[
            'latitude'=>$post['latitude'],
            'longitude'=>$post['longitude'],
            'three_words'=>$post['three_words']
        ]);

        $response->assertJsonFragment(['latitude'=>"{$post['latitude']}"]);
        $response->assertJsonFragment(['longitude'=>"{$post['longitude']}"]);
        $response->assertJsonFragment(['three_words'=>"{$post['three_words']}"]);
    }

    /** @test */
    public function can_soft_delete_geo_3_words_record()
    {
        $geo3Words = GeoThreeWords::factory(10)->create();

        $this->assertInstanceOf(Collection::class,$geo3Words);

        $randomThreeWords = $geo3Words->random();
        $this->assertInstanceOf(GeoThreeWords::class,$randomThreeWords);

        $this->assertNull($randomThreeWords->deleted_at);

        $route = route('three.words.delete',['geo'=>$randomThreeWords]);

        $response = $this->deleteJson($route);
        $response->assertStatus(200);

        $randomThreeWords = GeoThreeWords::withTrashed()->where('id','=',$randomThreeWords->id)->first();

        $this->assertNotNull($randomThreeWords->deleted_at);
    }
}
