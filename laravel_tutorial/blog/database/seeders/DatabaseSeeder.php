<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //only need truncate if dont refresh database when seed(avoid doubles that are not allowed error)
        User::truncate();
        Category::truncate();
        Post::truncate();

        
        //Post::factory(5)->create(); //now that i have factory dont need any of the commented code!!

        $user = User::factory()->create([
            'name' =>'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id'=> $user->id,
        ]);



        //factory(number of users want to create)->create()//if not specifid returns only 1 user instead of collection
        // $user = User::factory()->create(); //looks like it creates 10 users

        // $personal = Category::create([
        //     'name'=>'Personal',
        //     'slug'=>'personal'
        // ]);

        // $family = Category::create([
        //     'name'=>'Family',
        //     'slug'=>'family'
        // ]);

        // $work = Category::create([
        //     'name'=>'Work',
        //     'slug'=>'work'
        // ]);

        // Post::create([
        //     'user_id'=>$user->id,
        //     'category_id'=>$family->id,
        //     'slug' =>'my-first-post',
        //     'title' =>'My Family Post',
        //     'excerpt'=>'Lorem ipsum dolar sit amet.',
        //     'body' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>",

        // ]);

        // Post::create([
        //     'user_id'=>$user->id,
        //     'category_id'=>$work->id,
        //     'slug' =>'my-second-post',
        //     'title' =>'My Work Post',
        //     'excerpt'=>'Lorem ipsum dolar sit amet.',
        //     'body' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>",

        // ]);

        // Post::create([
        //     'user_id'=>$user->id,
        //     'category_id'=>$personal->id,
        //     'slug' =>'my-third-post',
        //     'title' =>'My Personal Post',
        //     'excerpt'=>'Lorem ipsum dolar sit amet.',
        //     'body' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>",

        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
