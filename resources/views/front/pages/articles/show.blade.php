@extends('front.layouts.app')

@section('style')
    <style>
        .news-show {
            background: url("{{ asset('images/bg30-Ar1web.gif') }}");
        }

        .card {
            border-radius: 30px;
        }

        .card-title {
            line-height: 2.2;
            font-size: 25px;
            color: #233142;
        }

        .special-heading h2 {
            font-size: 30px;
        }
    </style>
@stop

@section('content')
    <div class="news-show">
        <div class="special-heading">
            <h2>{{ $article->title }}</h2>
        </div>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10">
                    <div class="card text-center py-5 px-sm-3 hvr-glow">
                        <div class="header-card d-flex justify-content-center mb-4">
                            <div class="col-sm-12 col-md-10 col-lg-7">
                                <img class="card-img-top hvr-glow" src="{{ asset($article->image) }}" height="250">
                            </div>
                        </div>
                        <h4 class="card-title mb-0">{{ $article->content }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop




