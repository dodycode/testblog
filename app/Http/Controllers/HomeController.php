<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogTag;
use App\BlogCategory;
use App\Post;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::where('deleted', '0')->orderBy('id', 'desc')->paginate(3);

        return view('homepage')
        ->with('posts', $posts);
    }

    public function redirectToIndex(){
        return redirect()->to('/');
    }

    public function showPostOrPage($slug){
    	$post = Post::where('slug', $slug)->first();

        //tambahin view count
        $hitunganSebelum = $post->view_count;
        $hitunganBaru = $hitunganSebelum + 1;
        $arrayHitungan = ['view_count' => $hitunganBaru];
        $execute = Post::where('slug', $slug)->update($arrayHitungan);

    	$posts = Post::where('deleted', '0')->orderBy('id', 'desc')->limit(5)->offset(0)->get();

        $popularPosts = Post::where('deleted', '0')
        ->where('view_count', '>', '0')
        ->orderBy('view_count', 'desc')
        ->limit(5)
        ->offset(0)
        ->get();

        $tags = BlogTag::where('deleted', '0')->get();

        $categories = BlogCategory::withCount('posts')->where('deleted', '0')->get();

    	return view('static-page')
    	->with('post', $post)
    	->with('posts', $posts)
        ->with('popularPosts', $popularPosts)
        ->with('tags', $tags)
        ->with('categories', $categories);
    }
}
