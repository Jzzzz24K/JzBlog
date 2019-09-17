<?php


namespace App\services;


use App\Models\Tag;

class TagService
{
    protected $tags;
    public function __construct(Tag $tags)
    {
        $this->tags = $tags;
    }

    public function getAllTags()
    {
        return $this->tags::pluck('tag');
    }
}
