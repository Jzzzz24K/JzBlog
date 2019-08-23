@extends('admin.layout')

@section('style')
    <link href="{{ asset('css/pickadate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.default.css') }}" rel="stylesheet">
    <link href="{{asset('css/simplemde.min.css')}}" rel="stylesheet">

@stop

@section('content')
    <div class="row col-md-5 offset-1">
        <h3>文章
            <small> >> 编辑文章</small>
        </h3>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5>编辑文章表单</h5>
                </div>
                @include('partials.errors')
                @include('partials.success')
                <div class="card-body">
                    <form method="post" action="{{route('post.update',$id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @include('admin.post._form')
                        <div class="row">
                            <div class="col-md-5 offset-1">
                                <button type="submit" class="btn btn-primary"> 修改表单</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-delete"> 删除表单
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <div class="modal" tabindex="-1" role="dialog" id="modal-delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">删除文章</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>确定删除吗？</p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{route('post.destroy',$id)}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger">删除</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('js/pickadate.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="{{ asset('/js/simplemde.js')}}"></script>

    <script>
        $(function () {
            $("#publish_date").pickadate({
                format: "yyyy-mm-dd"
            });
            $("#publish_time").pickatime({
                format: "h:i A"
            });
            $("#tags").selectize({
                create: true
            });

        });
        // Most options demonstrate the non-default behavior
        var simplemde = new SimpleMDE({
            autofocus: true,
            autosave: {
                enabled: true,
                uniqueId: "editor01",
                delay: 1000,
            },
            blockStyles: {
                bold: "__",
                italic: "_"
            },
            element: document.getElementById("editor"),
            forceSync: true,
            hideIcons: ["guide", "heading"],
            indentWithTabs: false,
            initialValue: "",
            insertTexts: {
                horizontalRule: ["", "\n\n-----\n\n"],
                image: ["![](http://", ")"],
                link: ["[", "](http://)"],
                table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
            },
            lineWrapping: false,
            parsingConfig: {
                allowAtxHeaderWithoutSpace: true,
                strikethrough: false,
                underscoresBreakWords: true,
            },
            placeholder: "请使用Markdown 编写，图片只支持远程url。",
            promptURLs: true,
            renderingConfig: {
                singleLineBreaks: false,
                codeSyntaxHighlighting: true,
            },
            shortcuts: {
                drawTable: "Cmd-Alt-T"
            },
            showIcons: ["code", "table"],
            spellChecker: false,
            status: false,
            status: ["autosave", "lines", "words", "cursor"], // Optional usage
            status: ["autosave", "lines", "words", "cursor", {
                className: "keystrokes",
                defaultValue: function (el) {
                    this.keystrokes = 0;
                    el.innerHTML = "0 Keystrokes";
                },
                onUpdate: function (el) {
                    el.innerHTML = ++this.keystrokes + " Keystrokes";
                }
            }], // Another optional usage, with a custom status bar item that counts keystrokes
            styleSelectedText: false,
            maximumSelectionLength: 3,
            tabSize: 4,
            toolbarTips: true,
        });
    </script>
@stop
