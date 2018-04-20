<?php

namespace App\Http\Controllers;

use App\category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();
        if($category->Count() <= 0 || $tags->count() <= 0){
            Session::flash('info', 'Before insart a post, you must be insert a category or a tag.');

            return redirect()->back();
        }

        return view('admin.post.create')->with('category', $category)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            "title" => "required|max:255",
            "contant" => "required",
            "featured" => "required|image",
            "category_id" => "required",
            "tags" => "required"
        ]);

       $featured = $request->featured;

       $featured_new_name = time().$featured->getClientOriginalName();

       $featured->move('upload/posts', $featured_new_name);

       $post = Post::create([
           "title" => $request->title,
           "contant" => $request->contant,
           "featured" => "upload/posts/".$featured_new_name,
           "category_id" => $request->category_id,
           "slug" => str_slug($request->title)
       ]);

       $post->tags()->attach($request->tags);

       Session::flash('success', 'Post is created.');

       return redirect()->route('post.create');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        $tags = Tag::all();

        if($categories->Count() <= 0){
            Session::flash('info', 'Pleas insart post you must be insert a category.');

            return redirect()->back();
        }

        return view('admin.post.edit')->with('categories', $categories)->with('post', $post)->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "title" => "required|max:255",
            "contant" => "required",
            "category_id" => "required"
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured')){
            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('upload/posts', $featured_new_name);

            $post->featured = $featured_new_name;
        }

        $post->title =  $request->title;
        $post->contant = $request->contant;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post is updated.');
        //dd($request->all());
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'delete successfully.');

        return redirect()->route('post.index');
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();

        return view('admin.post.trashed')->with('posts', $posts);
    }

    public function kill($id){
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->forceDelete();

        Session::flash('success', 'Permanently delete successfully.');

        return redirect()->route('post.trash');
    }

    public function restore($id){

        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->restore();

        Session::flash('success', 'Post successfully restore.');

        return redirect()->route('post.index');
    }
}
