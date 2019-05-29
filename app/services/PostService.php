<?php


namespace App\services;


use App\Model\Post;
use Carbon\Carbon;
use phpDocumentor\Reflection\DocBlock\Tag;

class PostService
{
    protected $tag;
    
    public function __construct($tag)
    {
        $this->tag = $tag;
    }
    
    public function lists()
    {
        if($this->tag){
            return $this->tagIndexData($this->tag);
        }
        
        return $this->normalIndexData();
    }
    
    public function tagIndexData($tag)
    {
        $tag = \App\Models\Tag::where('tag', $tag)->firstOrFail();
        $reverse_direction = (bool)$tag->reverse_direction;
        
        $post = Post::where('published_at', '<', Carbon::now())
            ->whereHas('tags', function($query) use ($tag) {
                $query->where('tag', '=', $tag->tag);
            })
            ->where('is_draft', 0)
            ->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
            ->simplePaginate(config('blog.posts_per_page'));
    
        $post->appends('tag', $tag->tag);
        $page_image = $tag->page_image ? : config('blog.page_image');
    
        return [
            'title' => $tag->title,
            'subtitle' => $tag->subtitle,
            'posts' => $post,
            'page_image' => $page_image,
            'tag' => $tag,
            'reverse_direction' => $reverse_direction,
            'meta_description' => $tag->meta_description ?: config('blog.description'),
        ];
    
    }
    
    public function normalIndexData()
    {
        $posts = Post::where('published_at', '<', Carbon::now())
            ->where('is_draft', 0)
            ->orderby('published_at', 'desc')
            ->simplePaginate(config('blog.pagesize'));
        return [
            'title' => config('blog.title'),
            'subtitle' => config('blog.subtitle'),
            'posts' => $posts,
            'page_image' => config('blog.page_image'),
            'meta_description' => config('blog.description'),
            'reverse_direction' => false,
            'tag' => null,
        ];
    }
}