<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;

/**
 * Class GridTest
 * @package Tests\Feature
 */
class GridTest extends \Tests\TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @var User  */
    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        Sanctum::actingAs($this->user);
    }

    /** @test  */
    public function can_receive_grid_object()
    {

    }
}
