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
        // you can use it here if you want to
        $this->authorize('create', Post::class);

        // admin/posts/create
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        // dd(request()->all());
        $this->authorize('create', Post::class);

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
        // $posts = Post::all();

        $posts = auth()->user()->posts()->paginate(5);

        // example of policies
        // $posts = Post::all();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function destroy(Post $post, Request $request)
    {
        // if(auth()->user()->id !== $post->user_id) {

        // }
        $this->authorize('delete', $post);

        $post->delete();

        // temporary session

        // 1 way
        Session::flash('message', 'Post was Deleted');

        // 2 way
        $request->session()->flash('message2', 'Post was Deleted Message 2');

        return back();
    }

    public function edit(Post $post)
    {
        // $post = Post::findOrFail($post);

        $this->authorize('view', $post);

        if (auth()->user()->can('view', $post)) {
            return view('admin.posts.edit', ['post' => $post]);
        }
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file', //'file'
            'body' => 'required',
        ]);

        // we do not have to use it
        // $post = new Post();
        // $post->title = request('title');

        if (request('post_image')) {
            //
            // php artisan storage:link
            $inputs['post_image'] = request('post_image')->store('images'); // image is going to be stored under the random name
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        // $post->save();
        //or
        // auth()->user()->posts()->save($post);

        // authorization based on policy
        $this->authorize('update', $post);

        // $post->save();
        $post->update();

        session()->flash('post_updated', 'Post was updated');

        return redirect()->route('post.index');
    }
}
