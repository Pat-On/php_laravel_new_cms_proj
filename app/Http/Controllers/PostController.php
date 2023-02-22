<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;

use App\Http\Requests\PostDataRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // injecting the class
    public function show(Post $post)
    {   

        return view('blog-post', ['post'=>$post]);
    }

    public function create()
    {   

        // admin/posts/create
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {   
        // dd(request()->all());
        
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file', //'file'
            'body' => 'required'
        ]);

        if(request('post_image')){
            //
            // php artisan storage:link
            $inputs['post_image'] = request('post_image')->store('images'); // image is going to be stored under the random name
        }

        // dd($request->post_image);
        // dd($request->input('post_image'));
        
        $user = auth()->user()->posts()->create($inputs);

        return back();
    }
}
