<?php

namespace App\Http\Controllers;

use App\Model\Post;
use App\Models\Tag;
use App\services\PostService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $postService = new PostService($tag);
        $data = $postService->lists();
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';
        $data['tags'] = Tag::all()->toArray();
        return view($layout, $data);
    }
    
//    public function show($slug)
//    {
//        $data = Post::where('slug',$slug)->first();
//        return view('blog.show',compact('data'));
//    }
    
    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->where('slug', $slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::where('tag', $tag)->firstOrFail();
        }
        return view($post->layout, compact('post', 'tag'));
    }
}

