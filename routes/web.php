<?php

use App\Models\Post;

use Illuminate\Support\Facades\Route;

use Spatie\YamlFrontMatter\YamlFrontMatter;






Route::get('/', function () {

		$posts = Post::all();



   return view('posts', ['posts'=>$posts]);

   
});



Route::get('posts/{pos}', function($slug){ 



	return view('post', [

			'post'=>Post::findOrFail($slug)]);

	
});
