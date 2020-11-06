<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Tags\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $tags = Tag::getWithType('posts')->unique('slug');

        return view('posts.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $user = Auth::user();

            $validatedData = $request->validate([
                'title' => 'required|min:2',
                'content' => 'required|min:2',
            ]);

            $post = Posts::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'enabled' => $request->has('enabled') ? true : false,
            ]);

            if($request->has('file-Highligth')){
                $post
                    ->addMedia($request->file('file-Highligth'))
                    ->toMediaCollection('posts_highlight');
            }

            if($post){
                $user->posts()->sync([$post->id]);
            }

            if($request->has('tags')){
                $post->attachTags($request->get('tags'), 'posts');
            }

            if($request->has('categories')){
                $post->categories()->sync($request->get('categories'));
            }

            flash('Post created successfully!')->success();

            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::with(['categories', 'tags'])->find($id);
        $categories = Categories::all();

        $tags = Tag::getWithType('posts')->unique('slug');
        $tags = $tags->diff($post->tags);

        return view('posts.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
            $validatedData = $request->validate([
                'title' => 'required|min:2',
                'content' => 'required|min:2',
            ]);
            $post = Posts::where('slug', $slug)->first();

            $post->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'enabled' => $request->has('enabled') ? true : false,
            ]);

            if($request->has('file-Highligth')){
                if(!$post->getMedia()->isEmpty()){
                    $post->getMedia()->isEmpty()->delete();
                }

                $post
                    ->addMedia($request->file('file-Highligth'))
                    ->toMediaCollection('posts_highlight');
            }

            if($request->has('categories')){
                $post->categories()->sync($request->get('categories'));
            }

            if($request->has('tags')){
                $post->syncTagsWithType($request->get('tags'), 'posts');
            }


            flash('Post updated successfully!')->success();

            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
