<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Model\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    
    protected $fieldList = [
        'title' => '',
        'subtitle' => '',
        'page_image' => '',
        'content_raw' => '',
        'meta_description' => '',
        'is_draft' => "0",
        'publish_date' => '',
        'publish_time' => '',
        'layout' => 'blog.layouts.post',
        'tags' => [],
    ];
    
    public function index()
    {
        return view('admin.post.index', ['posts' => Post::all()]);
    }
    
    public function create()
    {
        $post = [];
        foreach($this->fieldList as $field => $default){
            $post[$field] = old($field, $default);
        }
        $post['allTags'] = Tag::all()->pluck('tag')->all();
        return view('admin.post.create', $post);
    }
    
    public function store(PostCreateRequest $request)
    {
        $post = Post::create($request->postData());
        
        $post->syncTags($request->get('tags',[]));
        
        return redirect('/admin/post')->with('success','文章创建成功');
    }
    
    public function edit($id)
    {
        $post = $this->fieldsFromModel($id, $this->fieldList);
        return view('admin.post.edit',$post);
    }
    
    public function update(PostUpdateRequest $request,$id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->postData());
        $post->save();
        
        $post->syncTags($request->tags,[]);
    
        return redirect()->route('post.index')->with('success','文章已保存.');
    }
    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();
    
        return redirect()->route('post.index')->with('success','文章删除成功');
    }
    
    public function fieldsFromModel($id, array $fields)
    {
        $post = Post::findOrFail($id);
        foreach($fields as $field=>$default)
        {
            $fields[$field] = $post->{$field};
        }
        $fields['id'] = $id;
        $fields['tags'] = $post->tags->pluck('tag')->all();
        $fields['allTags'] = Tag::all()->pluck('tag')->all();
//            dd($fields);
        return $fields;
    }
}
