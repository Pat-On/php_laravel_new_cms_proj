<?php

namespace App\Http\Controllers;
use App\Models\Post;

class PostController extends Controller
{
    // injecting the class
    public function show(Post $post)
    {   

        return view('blog-post', ['post'=>$post]);
    }
}
