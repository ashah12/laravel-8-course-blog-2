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
//        $user = User::factory()->create([
//            'name' => 'Abdullah Shahzad'
//        ]);

        Post::factory(5)->create();
    }
}
