<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class WelcomeController extends Controller
{
    public function index(){
        return view("blog.index", [
            "posts" => Post::search()->published()->latest('published_at')->simplePaginate(2),
            "categories" => Category::all(),
            "tags" => Tag::all()
        ]);
    }

    public function show(Post $post) {
        $categories = Category::all();
        $tags = Tag::all();
        return view('blog.post', compact([
            'post',
            'tags',
            'categories'
        ]));
    }

    public function category(Category $category){
        return view("blog.index", [
            "posts" => $category->posts()->search()->published()->simplePaginate(2),
            "categories" => Category::all(),
            "tags" => Tag::all()
        ]); 
    }
    public function tag(Tag $tag){
        return view("blog.index", [
            "posts" => $tag->posts()->search()->published()->simplePaginate(2),
            "categories" => Category::all(),
            "tags" => Tag::all()
        ]); 
    }
}