@extends('front.layouts.app')


@section('style')
    <style>
        header .header-side {
            background-image: url("{{ asset('images/header-side.jpg') }}");
        }

        .our-works {
            background: url("{{ asset('images/we-offer.png') }}") no-repeat center center;
        }

        .my-works {
            background: url("{{ asset('images/bg30-Ar1web.gif') }}");
        }

        .our-clients {
            background: url("{{ asset('images/our-client-bg.jpg') }}") no-repeat 100% 100%;
        }
    </style>
@stop

@section('content')
    <!--Start Header-->

    <header class="mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <img src="{{ asset($setting->intro_image) }}" class="mt-5 w-100">
                </div>
                <div class="col-md-7 col-sm-12 header-side">
                    <h2> ابداع تك شريكك التقني الامثل لبدأ مشروعك الان</h2>
                </div>
            </div>
        </div>
    </header>

    <!--End Header-->

    <!------------------------------------------------------------------------------------------------>

    <!--Start About Us-->

    <section id="about-us" class="about-us mb-5">
        <div class="title text-center">
            <h2>من نحن ؟</h2>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset($setting->slogan_image) }}" width="85%" height="480px">
                </div>
                <div class="col-md-6 about-ipda3">
                    <h4>{{ $setting->slogan_content }}</h4>
                </div>
            </div>
        </div>
    </section>

    <!--End About Us-->

    <!------------------------------------------------------------------------------------------------>

    <!--Start Our Works-->

    <div id="our-works" class="works">
        <div class="title text-center">
            <h2>ما نقدمه لكم</h2>
            <hr>
        </div>
        <section class="our-works d-flex align-items-center">
            <div class="container">
                <div class="owl-carousel owl-theme" id="clients-slider">
                    @foreach ($services as $service)
                        <div class="item">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset($service->image) }}">
                                <div class="card-body text-center">
                                    <h4 class="card-title">
                                        <a href="javascript:void(0);">{{ $service->title }}</a>
                                    </h4>
                                    <p class="card-text" data-toggle="tooltip" data-placement="top"
                                       title="{{$service->content}}">{{ Str::limit($service->content, 100) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>

    <!--End Our Works-->

    <!------------------------------------------------------------------------------------------------>

    <!--Start Some Work-->

    <section id="some-works" class="some-works">
        <div class="title text-center">
            <h2>بعض أعمالنا</h2>
            <hr>
        </div>
        <section class="my-works">
            <div class="container">
                <div class="row text-center">
                    @foreach ($projects as $project)
                        <div class="col-xs-12 col-md-6 col-lg-4">
                            <a href="{{ route('front.projects.show', $project->id) }}">
                                <div class="card hvr-grow-shadow">
                                    <img class="card-img-top" src="{{ asset($project->image) }}" alt="">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $project->title }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="btn-shahed text-center">
                    <a href="{{ route('front.projects.index') }}" class="btn btn-lg hvr-grow-shadow" role="button"
                       aria-pressed="true">شاهد كل اعمالنا</a>
                </div>
            </div>
        </section>
    </section>

    <!--End Some Work-->

    <!------------------------------------------------------------------------------------------------>

    <!--Start News-->

    <section id="news" class="news">
        <div class="title text-center">
            <h2>بعض المقالات</h2>
            <hr>
        </div>
        <div class="container">
            <div class="row justify-content-around pt-5">
                @foreach ($articles as $article)
                    <div class="col-md-5">
                        <div class="card hvr-glow">
                            <img class="card-img-top" src="{{ asset($article->image) }}" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ $article->title }}</h4>
                                <div class="news-action d-flex justify-content-between">
                                    <a class="btn btn-lg hvr-wobble-top"
                                       href="{{ route('front.articles.show', $article->id) }}" role="button">اقرأ
                                        الأن</a>
                                    <div>
                                        <span class="text-muted">{{ $article->views }}</span>
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn-news text-center">
                <a href="{{ route('front.articles.index') }}" class="btn btn-lg hvr-grow-shadow" role="button"
                   aria-pressed="true">المزيد</a>
            </div>
        </div>
    </section>

    <!--End News-->

    <!------------------------------------------------------------------------------------------------>

    <!--Start Our Clients-->

    <div id="clients" class="clients">
        <div class="title text-center">
            <h2>عملاء نفتخر بهم</h2>
            <hr>
        </div>
        <section class="our-clients d-flex align-items-center">
            <div class="container">

                <div class="owl-carousel owl-theme" id="works-slider">
                    @foreach ($clients as $client)
                        <a href="{{ $client->url }}" target="_blank">
                            <div class="item">
                                <img src="{{ asset($client->image) }}">
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <!--End Our Clients-->
@stop


@section('script')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
