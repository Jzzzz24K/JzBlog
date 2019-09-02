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

    /**
     * @param $slug
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->where('slug', $slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::where('tag', $tag)->firstOrFail();
        }

        //全部标签
        $tags = Tag::pluck('tag');

        //其他相关文章
        $post_tags = [];
        foreach($post->tags as $item){
            $post_tags[] = $item->tag;
        }

        //相关文章
        $correlation_post = Post::where('published_at', '<', Carbon::now())
            ->whereHas('tags', function($query) use ($post_tags) {
                $query->whereIn('tag', $post_tags);
            })
            ->select('title','slug')
            ->orderBy('published_at',  'desc')
            ->take(5)->get();

        return view($post->layout, compact('post', 'tag', 'tags','correlation_post'));
    }
}

