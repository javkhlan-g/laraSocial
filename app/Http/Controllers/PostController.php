<?php
/**
 * Created by PhpStorm.
 * User: Javkhlan.G
 * Date: 3/22/2017
 * Time: 4:26 PM
 */

namespace Social\Http\Controllers;

use Illuminate\Http\Request;
use Social\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Social\Post;

class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }

    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request['body'];
        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Poas successfully created';
        }

        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted']);
    }
}