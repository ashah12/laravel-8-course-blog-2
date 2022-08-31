<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        // add a comment to the given post

        // need to do some validation
        request()->validate([
            'body' => 'required'
        ]);



//        dd(request()->all());
        $post->comments()->create([
//            'post_id' => $post->id(), // $post->comments()->create([ <- this will create the post_id for you
//            'user_id' => auth()->id(), // this works
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);


        return back();
    }

}
