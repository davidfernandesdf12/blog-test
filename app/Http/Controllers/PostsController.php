<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;
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

        return view('posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'title' => 'required|min:4',
                'content' => 'required|min:4',
            ]);
            $post = Posts::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'enabled' => $request->has('enabled') ? true : false,
            ]);

            if($request->has('tags')){
                $post->attachTags($request->get('tags'), 'posts');
            }

            if($request->has('categories')){
                $post->categories()->sync($request->get('categories'));
            }

            flash('Post created successfully!')->success();

            return redirect()->back();
        }catch (\Exception $exception) {
            $this->error($exception);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        dd(Posts::with('tags')->find($id));
        dd(Posts::find($id)->withAllTags(['dsdasdad'], 'posts')->get()->isEmpty());
        dd(Posts::with('categories')->get());
//        dd(Tag::getWithType('posts')->unique('slug'));
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
        try{
            $validatedData = $request->validate([
                'title' => 'required|min:4',
                'content' => 'required|min:4',
            ]);
            $post = Posts::where('slug', $slug)->first();

            $post->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'enabled' => $request->has('enabled') ? true : false,
            ]);

            if($request->has('categories')){
                $post->categories()->sync($request->get('categories'));
            }

            if($request->has('tags')){
                $post->syncTagsWithType($request->get('tags'), 'posts');
            }


            flash('Post updated successfully!')->success();

            return redirect()->back();

        }catch (\Exception $exception) {
            $this->error($exception);

        }
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
