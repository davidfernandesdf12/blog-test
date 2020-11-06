<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        if($request->has('category_slug')){
            $category = Categories::where('slug', $request->get('category_slug'))->first();

            if($category)
            {
                $posts = Posts::with(['user'])->enabled()->whereHas('categories', function ($q) use($category){
                    $q->where('slug', $category->slug);
                })->simplePaginate(9);
            }else
            {
                $category = null;
                $posts = Posts::with(['user'])->enabled()->simplePaginate(9);
            }
        }else
        {
            $category = null;
            $posts = Posts::with(['user'])->enabled()->simplePaginate(9);
        }

        $categories = Categories::with('posts')->get();

        return view('home', compact('posts', 'categories', 'category'));
    }

    public function postInternal($slug){
        $post = Posts::with(['user'])->enabled()->where('slug', $slug)->first();

        if(empty($post)){
            abort(404, 'Page not found');
        }

        $categories = Categories::with('posts')->get();

        return view('post-internal', compact('post','categories'));
    }
}
