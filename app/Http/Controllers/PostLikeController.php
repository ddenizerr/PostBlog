<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Env\Response;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request)
    {
        if ($post->likedBy($request->user())) { //if already liked by the same user
            return response(null,409); //conflict http code
        }
        $post->likes()->create([
            'user_id'=>$request->user()->id,
        ]);

        return back();
    }

    public function destroy(Post $post, Request $request)
    {
       $request->user()->likes()->where('post_id', $post->id)->delete();

       return back();
    }
}
