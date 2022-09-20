<?php

use App\Models\Post;

use Illuminate\Support\Facades\Route;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;




Route::get('/',[PostController::class,'index'], )->name('home');

Route::get('posts/{post:slug}', [PostController::class,'show']);

Route::get('authors/{author:username}', function(User $author)
	{
		return view ('posts', 
		['posts'=> $author->posts,
		'categories'=>Category::all()]
	);
	}
);
Route::get('categories/{category:slug}', function(Category $category)
	{
		return view ('posts', 
		['posts'=> $category->posts,
		'currentCategory'=>$category,
		'categories'=>Category::all()]
	);
	})->name('category');



