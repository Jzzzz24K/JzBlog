@extends('blog.layouts.master')

@section('styles')
    <style>
        .jz-body{
            background-image: url('{{ page_image('4bd4eccad812da37cffecfdb50beb0e1.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment:fixed;
        }
        #card {
            transition: all .5s;
            -webkit-transition: all .5s;
            -ms-transition: all .5s;
            margin-bottom: 10px;
            max-height: 280px;
            overflow: hidden;
        }

        #card:hover {
            -webkit-transform: translateY(-10px);
            -moz-transform: translateY(-10px);
            -ms-transform: translateY(-10px);
            -o-transform: translateY(-10px);
            transform: translateY(-10px);
            cursor: pointer;
        }

        .img-card {
            object-fit: cover;
            opacity: 0.8;
            overflow: hidden;
        }

        footer {
            margin-bottom: 0;
        }
    </style>
@stop

@section('page-header')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                                    <div class="card mt-md-3 bg-dark text-white border-0" id="card">
                                        <img class="card-img img-card"
                                             src="{{ page_image('home-bg.jpg') }}" alt="Card image">
                                        <div class="card-img-overlay">
                                            <p class="text-center" style="color: gray;font-family:Roboto,Open Sans, sans-serif">2019年5月10日</p>
                                            <p class="card-text text-center" style="font-size: 3vw;;font-family: Roboto,Open Sans, sans-serif;font-weight: 300">
                                                Laravel+bootstrap构建易博客</p>
                                            <p class="card-text text-center" style="font-size: x-large;">
                                                php,laravel,bootstrap</p>
                                        </div>
                                    </div>
                <div class="card mt-md-5 bg-dark text-white border-0 shadow-lg" id="card">
                    <img class="card-img img-card"
                         src="{{ page_image('home-bg.jpg') }}" alt="Card image">
                    <div class="card-img-overlay" style="top:25%">
                        <div class="card-text text-center">
                            <h5 style="color: #ffffff;font-family: Unica One">2019年5月10日</h5>
                            <span style="font-size: xx-large;font-family: Roman;">Laravel+bootstrap构建简易博客</span>
                        </div>
                        <p class="card-text text-center mt-md-5" style="font-size: x-large;font-family: PilGi;">
                            php,laravel,bootstrap</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop