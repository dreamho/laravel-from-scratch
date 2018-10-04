<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();

        return PostResource::collection($posts);
//        return response()->json(['posts' => $posts], 200);
    }
}
