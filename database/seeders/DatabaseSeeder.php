<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Database\Seeder;
use GuzzleHttp\Promise\Create;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user= User::factory()->create([
            'name'=>'John Due'
        ]);

        Post::factory(5)->create([

            'user_id'=>$user->id
        ]);

    }
}
