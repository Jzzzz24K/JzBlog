<div class="row">
    <div class="col-md-7">
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label text-center">标题</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="{{$title}}">
            </div>
        </div>
        <div class="row">
            <label for="page_image" class="col-sm-2 col-form-label text-center">缩略图</label>
            <div class="col-sm-6">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="page_image" id="page_image">
                    <label class="custom-file-label" for="page_image">选择文件</label>
                </div>
            </div>
            <div class="col-sm-4">
                <img src="{{$page_image}}" class="img img_responsive"
                     id="page-image-preview" style="max-height:40px">
            </div>
        </div>
        <div class="form-group row">
            <label for="layout" class="col-sm-2 col-form-label text-center">布局</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="layout" name="layout" value="{{$layout}}">
            </div>
        </div>

    </div>
    <div class="col-md-5">
        <div class="form-group row">
            <label for="published_date" class="col-sm-4 col-form-label text-center">发布日期</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="publish_date" name="publish_date" value="{{$publish_date}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="published_time" class="col-sm-4 col-form-label text-center">发布时间</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="publish_time" name="publish_time" value="{{$publish_time}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="tag" class="col-sm-4 col-form-label text-center">标签</label>
            <div class="col-sm-8">
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @foreach ($allTags as $tag)
                        <option @if (in_array($tag, $tags)) selected @endif value="{{ $tag }}">
                            {{ $tag }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>


    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-sm-12">
                <textarea type="text" class="form-control" style="resize:none" rows="9" id=""
                          name="content_raw">
                    {{$content_raw}}
                </textarea>
            </div>
        </div>
    </div>

</div>
