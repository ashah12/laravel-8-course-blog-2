<?php

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
//        \App\Models\User::factory(10)->create();  // doesn't have fatory
//        factory(User::class, 50)->create();
        User::truncate();
        Category::truncate();
        Post ::truncate();

//        factory(User::class, 5)->create();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>Hello darkness my old friend!</p>',
            'body' => '<p>Hello darkness my old friend, I have come to talk with you again!</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-second-post',
            'excerpt' => '<p>Hello darkness my old friend!</p>',
            'body' => '<p>Hello darkness my old friend, I have come to talk with you again!</p>'
        ]);
    }
}
