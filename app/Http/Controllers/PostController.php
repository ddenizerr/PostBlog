<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Post
 *
 * @mixin Eloquent
 */
class PostController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index(){

        $posts = Post::latest()->with(['user','likes'])->paginate(20);
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'body'=>'required',
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();

    }

    public function destroy(Post $post, Request $request){
//        if ($post->ownedBy(auth()->user())){
//            dd('bad! no!');
//        }

        $this->authorize('delete',$post);//checks if the post can be deleted by the user.
                                               //throws exception
        $post->delete();

        return back();
    }
}
