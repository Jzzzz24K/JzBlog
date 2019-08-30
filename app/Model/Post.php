<?php

namespace App\Model;

use App\Models\Tag;
use App\Services\Markdowner;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Post extends Model
{
    protected $dates = ['published_at'];
    
    protected $fillable = [
        'title','page_image','content_raw','published_at','layout'
    ];
    
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        if(!$this->exists){
            $this->attributes['slug'] = str_slug($value);
        }
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tag_pivot');
    }
    
    /**
     * 返回 published_at 字段的日期部分
     */
    public function getPublishDateAttribute($value)
    {
        return $this->published_at->format('Y-m-d');
    }
    
    /**
     * 返回 published_at 字段的时间部分
     */
    public function getPublishTimeAttribute($value)
    {
        return $this->published_at->format('g:i A');
    }
    
    /**
     * content_raw 字段别名
     */
    public function getContentAttribute($value)
    {
        return $this->content_raw;
    }
    
    public function syncTags(Array $tags)
    {
        Tag::addNeedTags($tags);
        
        if(count($tags)){
            $this->tags()->sync(Tag::whereIn('tag',$tags)->get()->pluck('id')->all());
            return;
        }
        
        $this->tags()->detach();
    }
    
    public function setContentRawAttribute($value)
    {
        $this->attributes['content_raw'] = $value;
        $markdown = new \Parsedown();
        $this->attributes['content_html'] = $markdown->text($value);
        
    }
    
    public function url(Tag $tag=null)
    {
        $url = url('blog/' . $this->slug);
        
        if ($tag) {
            $url .= '?tag=' . urlencode($tag->tag);
        }
        
        return $url;
    }
    
    public function tagLinks($base = '/blog?tag=%TAG%')
    {
        $tags = $this->tags()->get()->pluck('tag')->all();
        $return = [];
        foreach ($tags as $tag) {
            $url = str_replace('%TAG%', urlencode($tag), $base);
            $return[] = '<a class="jz-blog-tag" href="' . $url . '">' . e($tag) . '</a>';
        }
        return $return;
    }
    
    public function newerPost(Tag $tag = null)
    {
        $query = static::where('published_at', '>', $this->published_at)
                ->where('published_at', '<=', Carbon::now())
                ->orderBy('published_at', 'asc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }
        
        return $query->first();
    }
    
    /**
     * Return older post before this one or null
     *
     * @param Tag $tag
     * @return \App\Models\Post
     */
    public function olderPost(Tag $tag = null)
    {
        $query = static::where('published_at', '<', $this->published_at)
                ->orderBy('published_at', 'desc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }
        
        return $query->first();
    }
}
