<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function posts($categ_slug = null)
    {
        if(is_null($categ_slug)) $posts = Post::published()->get();
        else{
            $posts =  Category::where('slug', $categ_slug)->first()->posts()->published()->get();
        }

        $view = view('posts', ["posts" => $posts]);
        return $view;
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('post', ["post" => $post]);
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        if($request->hasfile('thumbnail')){
            $image = $request->file('thumbnail');
            $filename = $data['slug'] . '.' . $image->getClientOriginalExtension();
            $data['thumbnail'] = $filename;
            $location = storage_path('app/public/img/thumbnail/');
            $image->move($location, $filename);
        } else {
            $data['thumbnail'] = '';
        }
        Post::create($data);
        return redirect('admin');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name', 'id');
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        if($request->hasfile('thumbnail')){
            $image = $request->file('thumbnail');
            $filename = $data['slug'] . '.' . $image->getClientOriginalExtension();
            $data['thumbnail'] = $filename;
            $location = storage_path('app/public/img/thumbnail/');
            $image->move($location, $filename);
        } else {
            $data['thumbnail'] = $post->getAttribute('thumbnail');
        }
        $post->update($data);
        return redirect('admin');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('admin');
    }
}
