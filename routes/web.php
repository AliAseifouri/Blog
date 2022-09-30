<?php

use App\Models\Post;

use Illuminate\Support\Facades\Route;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\services\Newsletter;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\NewsletterController;


Route::get('/',[PostController::class,'index'], )->name('home');

Route::get('posts/{post:slug}', [PostController::class,'show']);
Route::post('posts/{post:slug}/comments',[PostCommentsController::class,'store']);

Route::post('newsletter', NewsletterController::class);


Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');

Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');









// Route::get('authors/{author:username}', function(User $author)
// 	{
// 		return view ('posts.index', 
// 		['posts'=> $author->posts]
// 	);
// 	}
// );

// Route::get('categories/{category:slug}', function(Category $category)
// 	{
// 		return view ('posts', 
// 		['posts'=> $category->posts,
// 		'currentCategory'=>$category,
// 		'categories'=>Category::all()]
// 	);
// 	})->name('category');



