@extends('admin.layout')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <h3>每日一记
                        <small> >> 创建</small>
                    </h3>
                </div>
            </div>
            @include('partials.success')
            @include('partials.errors')
            <div class="card">
                <h5 class="card-header">新建工作日志</h5>
                <div class="card-body">
                    <form method="post" action="/admin/workLog/save" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label text-center">内容</label>
                            <textarea rows="3" cols="40" class="col-sm-8" name="content">{{$content}}</textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-center">类型</label>
                            <select class="custom-select col-sm-6" name="type">
                                <option selected>请选择</option>
                                <option value="1">primary</option>
                                <option value="2">success</option>
                                <option value="3">warning</option>
                                <option value="4">danger</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label text-center">图片</label>
                            <div class="custom-file col-sm-4">
                                @foreach($image as $value)
                                <input type="file" name="image" class="custom-file-input" id="file" value="{{$value}}"/>
                                @endforeach()
                                <label class="custom-file-label" for="customFile">选择图片</label>
                            </div>
                            <img class="col-ml-6 updateimg" src="" style="height: 500px;width: 500px;"/>
                            <div id="updatebox">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 offset-2">
                                <button type="submit" class="btn btn-primary">创建</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@stop

@section('script')
    <script>
        $(function () {
            $("#tags-table").DataTable({});
        });
        document.getElementById('file').onchange = function () {
            add();
            var imgFile = this.files[0];
            var fr = new FileReader();
            fr.onload = function () {
                var imgs = document.getElementsByClassName('updateimg');//获取所有img元素
                imgs[imgs.length - 1].src = fr.result;//设置最后一个img的src值
                /*document.getElementById('image').getElementsByTagName('img')[0].src = fr.result;*/
            };
            fr.readAsDataURL(imgFile);
        };

        function add() {
            var html = "<div class='col-sm-4'>" +
                "<div class='panel panel-info'>" +
                "<div class='panel-heading'>" +
                "<i class='fa fa-times' onclick='delete_click()'></i></div>" +
                "<div class='panel-body' style='text-align: center;'>" +
                "<div class='row'><div class='col-sm-12 col-md-12'>" +
                "<img class='updateimg img-responsive' src='img/p_big3.jpg' style='width: inherit;height: 210px;'/>" +
                "</div></div></div></div></div>";
            $("#updatebox").before(html);
        }

        function delete_click() {
            $(".fa-times").parent().parent().parent().remove();
        }
    </script>

@stop

