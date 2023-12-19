<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index(){

        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $posts = Post::with('category', 'tags')->paginate(20);
        return view('admin.index', compact('posts', 'categories', 'tags'));


    }


}
