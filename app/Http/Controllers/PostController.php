<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Response as HttpResponse;
use App\Http\Helpers\ApiResponse;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return ApiResponse::make(
            success: true,
            message: '',
            data: $posts->toArray(),
            statusCode: HttpResponse::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id()
        ]);

        return ApiResponse::make(
            success: true,
            message: '',
            data: [$post],
            statusCode: HttpResponse::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return ApiResponse::make(
                success: false,
                message: 'Post does Not exist',
                data: [],
                statusCode: HttpResponse::HTTP_NOT_FOUND
            );
        }

        return ApiResponse::make(
            success: true,
            message: '',
            data: [$post],
            statusCode: HttpResponse::HTTP_OK
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return ApiResponse::make(
                success: false,
                message: 'Post does Not exist',
                data: [],
                statusCode: HttpResponse::HTTP_NOT_FOUND
            );
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        
        return ApiResponse::make(
            success: true,
            message: '',
            data: [$post],
            statusCode: HttpResponse::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return ApiResponse::make(
            success: true,
            data: [],
            message: 'Post deleted successfully',
            statusCode: HttpResponse::HTTP_OK
        );
    }
}
