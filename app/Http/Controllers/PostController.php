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
    public function postCreatePost(Request $request)
    {
        $post = new Post();
        $post->body = $request['body'];
        $request->user()->posts()->save($post);
        return redirect()->route('dashboard');
    }
}