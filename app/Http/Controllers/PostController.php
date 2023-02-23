<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    // injecting the class
    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
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
            'body' => 'required',
        ]);

        if (request('post_image')) {
            //
            // php artisan storage:link
            $inputs['post_image'] = request('post_image')->store('images'); // image is going to be stored under the random name
        }

        // dd($request->post_image);
        // dd($request->input('post_image'));

        $user = auth()->user()->posts()->create($inputs);

        // 3rd way
        session()->flash('post-created-message', 'Post was created');


        return redirect()->route('post.index');
    }

    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function destroy(Post $post, Request $request)
    {
        $post->delete();

        // temporary session

        // 1 way
        Session::flash('message', 'Post was Deleted');

        // 2 way
        $request->session()->flash('message2', 'Post was Deleted Message 2');

        return back();
    }
}
