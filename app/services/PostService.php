<?php


namespace App\services;


use App\Model\Post;
use Carbon\Carbon;
use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\Types\Object_;
use Symfony\Component\VarDumper\Tests\Caster\MyArrayIterator;

class PostService
{
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    
    public function lists($tag)
    {
        if($tag){
            return $this->tagIndexData($tag);
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
            ->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
            ->simplePaginate(config('blog.posts_per_page'));
    
        $post->appends('tag', $tag->tag);
        $page_image = $tag->page_image ? : config('blog.page_image');
    
        return [
            'title' => $tag->title,
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

    //获取文章详情
    public function getArticle($slug)
    {
        return $this->post::with('tags')->where('slug', $slug)->firstOrFail();
    }

    /**
     * 获取相关文章
     * @param array $post_tags
     * @return mixed
     */
    public function getCorrelationArticles(array $post_tags)
    {
        return Post::where('published_at', '<', Carbon::now())
            ->whereHas('tags', function($query) use ($post_tags) {
                $query->whereIn('tag', $post_tags);
            })
            ->select('title','slug')
            ->orderBy('published_at',  'desc')
            ->take(5)->get();
    }
}
