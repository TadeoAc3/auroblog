<?php

namespace App\Http\Controllers;

use App\Post;

class PageController extends Controller
{
    
    public function index()
    {
        $posts = Post::orderBy('created_at', 'asc')->paginate(10);

        return view('home', [
            'posts' => $posts,
        ]);
    }

    public function post($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('post', [
            'post' => $post,
        ]);
    }
}
