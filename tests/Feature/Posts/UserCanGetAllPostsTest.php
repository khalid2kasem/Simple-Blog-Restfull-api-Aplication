<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Response as HttpResponse;
use App\Http\Helpers\ApiResponse;
use App\Models\Post;
use App\Models\User;

class UserCanGetAllPostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_get_all_posts(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('test_user_token')->plainTextToken;

        $posts = Post::factory()
            ->count(6)
            ->for($user)
            ->create();

        $response = $this->withHeaders(['Authorization'=>'Bearer '. $token])
                        ->get('/api/posts/');
        $postsData = $response->json()['data'];

        $response->assertOK();
        $this->assertCount(6, $postsData);
    }
}
