<?php

namespace App\Http\Controllers;

use App\Model\Post;
use App\Models\Tag;
use App\services\PostService;
use App\services\TagService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BlogController extends Controller
{
    protected $postService;
    protected $tagService;

    public function __construct(PostService $postService,TagService $tagService){
        $this->postService = $postService;
        $this->tagService = $tagService;
    }

    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $data = $this->postService->lists($tag);
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
        //获取文章详情
        $post = $this->postService->getArticle($slug);

        //获取全部标签
        $tags = $this->tagService->getAllTags();

        //其他相关文章
        $post_tags = [];
        foreach($post->tags as $item){
            $post_tags[] = $item->tag;
        }

        //相关文章
       $correlation_post = $this->postService->getCorrelationArticles($post_tags);

        return view($post->layout, compact('post', 'tags','correlation_post'));
    }
}

