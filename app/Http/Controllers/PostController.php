<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    public function index ()
    {  
       return view('posts.index', [
                'posts'=> Post::latest()->filter(
                    request(['search','category','author']))
                ->paginate(5)->withQueryString()
    
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [

			'post'=>$post]);
    }

}