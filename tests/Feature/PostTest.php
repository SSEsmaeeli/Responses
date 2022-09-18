<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Faker\Factory as Faker;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected $faker;

    private User $user;

    private Post|Model|null $post;

    /**
     * Sets up the tests
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->faker = Faker::create();

        $this->user = User::factory()->create();

        Artisan::call('migrate'); // runs the migration
    }


    /**
     * Rolls back migrations
     */
    public function tearDown(): void
    {
        Artisan::call('migrate:rollback');

        parent::tearDown();
    }

    public function test_post_owner_can_see_draft_post()
    {
        $this->post = Post::query()->create([
            'user_id' => $this->user->id,
            'title' => $this->faker->text,
            'body' => $this->faker->text,
        ]);

        $response = $this->actingAs($this->user)->get(route('posts.show', $this->post->uuid));

        $response
            ->assertOk()
            ->assertSeeText($this->post->title)
            ->assertSee(route('posts.state.update', $this->post->uuid));
    }

    public function test_other_user_cannot_see_a_user_draft_post()
    {
        $this->post = Post::query()->create([
            'user_id' => $this->user->id,
            'title' => $this->faker->text,
            'body' => $this->faker->text,
        ]);

        $newUser = User::factory()->create();
        $response = $this->actingAs($newUser)->get(route('posts.show', $this->post->uuid));

        $response
            ->assertForbidden();
    }
}
