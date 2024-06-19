<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(10);

        return view("blog.index", compact('categories', 'posts'));
    }


    public function postsCategory($slug)
    {
        $categories = Category::all();

        $posts = Post::whereHas('category', function ($query) use ($slug) {
            $query->whereslug($slug);
        })->paginate(10);

        return view("blog.index", compact('categories', 'posts'));
    }

    public function postDetails($slug)
    {
        $categories = Category::all();

        $post = Post::whereSlug($slug)->first();
        return view("blog.post", compact('categories', 'post'));
    }
}
