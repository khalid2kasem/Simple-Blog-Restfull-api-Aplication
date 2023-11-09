<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Response as HttpResponse;
use App\Http\Helpers\ApiResponse;
use App\Models\Post;
use App\Models\User;

class UserCanUpdateAPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_user_can_update_a_post(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('test_user_token')->plainTextToken;

        $post = Post::create([
            'title' => 'test title',
            'content' => 'this is a test content for the get post test case which has to be more than 50 char',
            'user_id' => $user->id,
        ]);

        $response = $this->withHeaders(['Authorization'=>'Bearer '. $token])
                ->put('/api/posts/'. $post->id, [
                    'title' => 'update test title',
                    'content' => 'updated content: this is a test content for the get post test case which has to be more than 50 char',
                ]);
        
        $postData = $response->json()['data'];

        $response->assertOK();
        $this->assertEquals('update test title', $postData[0]['title']);
    }
}
