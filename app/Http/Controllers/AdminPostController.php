<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index',
        [
            'posts'=> Post::paginate(59)
        ]);
    }

    public function create ()
    {

        return view('admin.posts.create');

			
    }

    public function store()
    {
        $attributes = array_merge($this->validatePost(),[
           'user_id'  => request()->user->id,
           'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ] );

        Post::create($attributes);
        
        //Or request()->user()->post()->create();

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }
    public function update(Post $post)
    {
       $attributes = $this->validatePost($post);

        if(isset($attributes['thumbnail']))
        {
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success','Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success','Post deleted!');

    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([

            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required|image'],
            'slug' => ['required',Rule::unique('posts','slug')->ignore($post)],
            'excerpt'=> 'required',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('Categories','id')],
            'published_at' => 'required'
        ]);

    }

}
