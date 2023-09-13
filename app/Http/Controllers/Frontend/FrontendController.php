<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Front;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',1)->paginate(3);
        $recentPosts = Post::where('status',1)->latest()->take(3)->get();
        $categories = Category::all();
        return view('frontend.dashboard',[
            'posts'=>$posts,
            'recentPosts'=>$recentPosts,
            'categories'=>$categories
        ]);
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $recentPosts = Post::latest()->take(3)->get();
        $categories = Category::all();
        return view('frontend.postdetail',[
            'post'=>$post,
            'recentPosts'=>$recentPosts,
            'categories'=>$categories
        ]);
    }
}
