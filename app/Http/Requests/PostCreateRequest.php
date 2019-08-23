<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title' => 'required',
            'page_image'=>'required',
            'content_raw' => 'required',
            'publish_date' => 'required',
            'publish_time' => 'required',
            'layout' => 'required',
        ];
    }
    
    public function postData()
    {
//        dd($this->input());
        if ($this->file('page_image')) {

            $save = Storage::putFile('jzblog', $this->file('page_image'));
            $url = Storage::url($save);
        }else{
            $url = $this->input('page_image');
        }
        $published_at = new Carbon($this->publish_date . ' ' . $this->publish_time);

        return [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'content_raw' => $this->content_raw,
            'layout' => $this->layout,
            'meta_description' => $this->meta_description,
            'is_draft' => (bool)$this->is_draft,
            'page_image' => $url,
            'published_at' => $published_at
        ];
    }
}
