<?php

namespace App\Http\Controllers\Post;

use App\Models\{
    Post,
    User,
    Category
};
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() {
        // step 1 authorize
        // $posts = auth()->user()->posts;

        // step 2 authorize
        // $posts = Post::paginate(5);
        $posts = Post::all();
        return view('posts.index',['posts'=>$posts]);
    }
    public function create() {
        $categories = Category::get();
        return view('posts.create',['categories'=>$categories]);
    }
    public function store(PostRequest $request) {
        // $this->validate($request,[
        //     'title'=>'required',
        //     'subTitle'=>'required',
        //     'descriptions'=>'required'
        // ]);
        // return $request->all();
        $this->authorize('create',Post::class);
        $request->validated();
        if($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            // return $fileNameToStore;
            $request->file('image')->storeAs('public/posts_image',$fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $post = new Post();
        $post->category_id = $request->category_id;
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->subTitle = $request->subTitle;
        $post->descriptions = $request->descriptions;
        $post->image = $fileNameToStore;
        $post->status = $request->status;
        $post->save();
        // Post::create([
        //     'title'=>$request->title,
        //     'subTitle'=>$request->subTitle,
        //     'descriptions'=>$request->descriptions,
        //     'image'=>$fileNameToStore
        // ]);
        return redirect()->route('post.index')->with('postStore','Post successfully created');
    }
    public function edit($id) {
        $post = Post::findOrFail($id);
        $this->authorize('view',$post);
        $category = Category::all();
        return view('posts.edit',[
            'post'=>$post,
            'category'=>$category
        ]);
    }
    public function update(PostRequest $request, $id) {
        // return $request->all();
        // $this->validate($request,[
        //     'title'=>'required',
        //     'subTitle'=>'required',
        //     'descriptions'=>'required'
        // ]);
        if($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            $request->file('image')->storeAs('public/posts_image',$fileNameToStore);
        }
        // $data = Post::where('id',$id)->update([
        //     'title'=>$request->title,
        //     'subTitle'=>$request->subTitle,
        //     'descriptions'=>$request->descriptions,
        //     'image'=> $fileNameToStore
        // ]);
         $post = Post::where('id',$id)->first();
         $post->category_id = $request->category_id;
         $post->title = $request->title;
         $post->subTitle = $request->subTitle;
         $post->descriptions = $request->descriptions;
         if($request->hasFile('image')) {
             if($post->image != "noimage.jpg") {
                 Storage::delete('public/posts_image/'.$post->image);
             }
            $post->image = $fileNameToStore;
        }
        $post->status = $request->status;
        $this->authorize('update',$post);
        $post->save();
        return redirect()->route('post.index')->with('updatePost','Post successfully Updated');
    }
    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show',['post'=>$post]);
    }
    public function destroy($id) {
        $post = Post::findOrFail($id);
        if($post->image != "noimage.jpg") {
            Storage::delete('public/posts_image/'.$post->image);
        }
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->route('post.index')->with('deletePost','Post successfully deleted');
    }
}
