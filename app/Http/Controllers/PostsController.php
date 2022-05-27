<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Http\Requests\Posts\CreatePostRequest;
use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['verifyCategoriesCount'])->only('create', 'store');
        $this->middleware(['validateAuthor'])->only('edit', 'update', 'destroy', 'trash');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->isAdmin()){
            $posts = Post::withoutTrashed()->where('user_id', Auth()->id())->paginate(10);
        }else {
            $posts = Post::paginate(10);
        }
        // dd($categories);
        // dd($posts->category);
        return view('posts.index', compact([
            'posts'
            ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // dd($tags = Tag::all());
        $tags = Tag::all();

        return view('posts.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        $isValid = true;
        $a = new SentimentAnalysis();

        // dd($request->title);
        // dd($a->decision($request->title));
        if(!strcmp($a->decision($request->title),"negative")){
            // dd("Hello");
            session()->flash('error', 'Your Title is inappropriate! Please Change it.');
            return redirect()->back()->withInput($request->all());
        }
        // dd($a->decision($request->excerpt));
        if(!strcmp($a->decision($request->excerpt),"negative")){
            session()->flash('error', 'Your Excerpt is inappropriate! Please Change it.');
            return redirect()->back()->withInput($request->all());
        }

        $content = $request->content;
        $result_array = preg_split( "/[.?!]/", $content);
        $answer = array();
        
        // dd($a->decision($result_array[1]));
        foreach($result_array as $result)
        {
            if(!strcmp($a->decision($result),"negative"))
            {
                    $isValid = false;
                    $string = Str::padBoth($result,strlen($result)+4, '*');
                    $content = str_replace($result,$string,$content);
            }
        }

        if(!$isValid){
            $request["content"] = $content;
            session()->flash('error', 'Your content is not appropriate! Sentences between **    ** are inappropriate please change those sentences');
            return redirect()->back()->withInput($request->all());
        }


        //Image Upload and stores the name of the image
        $image = $request->file('image')->store('posts');
        //run commad: php artisan storage:link
        //Create Post
        $post = Post::create([
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
            'content'=>$request->content,
            'image'=>$image,
            'user_id'=>auth()->id(),
            'category_id'=>$request->category_id,
            'published_at'=>$request->published_at
        ]);
        // dd($request->tags);
        $post->tags()->attach($request->tags);

        //session storage
        session()->flash('success', 'Post Created Successfully!');
        //redirect
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact(['post', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->only(['title', 'excerpt', 'content', 'published_at', 'category_id']);
        if($request->hasFile('image')){
            $image = $request->image->store('posts');
            $post->deleteImage();
            $data['image'] = $image;

        }
        $post->update($data);
        $post->tags()->sync($request->tags);
        session()->flash('success', 'Post updated successfully!');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->deleteImage();
        $post->forceDelete();
        session()->flash('success', 'Post Deleted Successfully!');
        return redirect()->back();
    }

    /**
     * Soft deletes the Post...
     */
    public function trash(Post $post)
    {
        $post->delete();
        session()->flash('success', 'Post trashed Successfully!');
        return redirect(route('posts.index'));
    }

    public function trashed(){
        // $tarshed = DB::table('posts')->whereNotNull('deleted_at');
        $trashed = Post::onlyTrashed()->paginate(10);
        return view('posts.trashed')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $trashedPost = Post::onlyTrashed()->findOrFail($id);
        $trashedPost->restore();
        session()->flash('success', 'Post restored Successfully!');
        return redirect(route('posts.index'));
    }
}
