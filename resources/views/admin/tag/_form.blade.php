<div class="form-group row ">
    <label for="tag" class="col-sm-2 col-form-label text-center">标签</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" name="tag" value="{{$tag}}">
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label text-center">标题</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="title" value="{{$title}}">
    </div>
</div>
<div class="form-group row">
    <label for="subtitle" class="col-sm-2 col-form-label text-center">副标题</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="subtitle" value="{{$subtitle}}">
    </div>
</div>
<div class="form-group row">
    <label for="meta_description" class="col-sm-2 col-form-label text-center">描述信息</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="meta_description" row="3">
            {{$meta_description}}
        </textarea>
    </div>
</div>
<div class="form-group row">
    <label for="page_image" class="col-sm-2 col-form-label text-center">图片</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="page_image" value="{{$page_image}}">
    </div>
</div>
<div class="form-group row">
    <label for="layout" class="col-sm-2 col-form-label text-center">布局</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="layout" value="{{$layout}}">
    </div>
</div>
<div class="form-group">
    <div class="row">
        <label for="layout" class="col-sm-2 text-center">排序</label>
        <div class="col-sm-9">
            <label>
                <input  type="radio" name="reverse_direction"
                        @if(!$reverse_direction)
                                checked
                        @endif
                        value="0">
                升序
            </label>
            <label>
                <input type="radio" name="reverse_direction"
                       @if($reverse_direction)
                       checked
                       @endif
                       value="1">
                逆序
            </label>
        </div>
    </div>
</div>
