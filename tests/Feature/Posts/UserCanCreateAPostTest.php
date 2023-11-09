<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response as HttpResponse;
use App\Http\Helpers\ApiResponse;
use App\Models\Post;
use App\Models\User;

class UserCanCreateAPostTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_a_post(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('test_user_token')->plainTextToken;

        $response = $this->withHeaders(['Authorization'=>'Bearer '. $token])
            ->post('/api/posts/', [
                'title' =>'test title',
                'content' => 'this is a test content for the get post test case which has to be more than 50 char',
                'user_id' => $user->id,
            ]);
        $postData = $response->json()['data'];
        logger($postData);
        $response->assertStatus(HttpResponse::HTTP_CREATED);
        $this->assertEquals('test title', $postData[0]['title']);
    }
}
