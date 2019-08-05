@extends('admin.layout')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <h3>箴言
                        <small> >> 列表</small>
                    </h3>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="/admin/dailySay/create">新增箴言</a>
                </div>
            </div>
            @include('partials.success')
            @include('partials.errors')
            <div class="row">
                <div class=" col-md-12">
                    <table class="table table-bordered" id="tags-table">
                        <thead>
                        <tr>
                            <th scope="col">箴言</th>
                            <th scope="col">创建时间</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dailys as $daily)
                            <tr>
                                <td>{{$daily['content']}}</td>
                                <td>{{$daily['created_at']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
    </script>

@stop
