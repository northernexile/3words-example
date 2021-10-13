<?php


namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

/**
 * Class CoordinatesTest
 * @package Tests\Feature
 */
class CoordinatesTest extends TestCase
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
    public function can_retrieve_three_words_from_api()
    {
        $post = [
            'latitude'=>$this->faker->latitude,
            'longitude'=>$this->faker->longitude,
        ];

        $route = route('three.words.coordinates.show');

        //Mock this next

        $response = $this->postJson($route,$post);
        $response->assertOk();
        $response->assertSeeText('nearestPlace');
        $response->assertSeeText('words');
        $response->assertSeeText('coordinates');
    }
}
