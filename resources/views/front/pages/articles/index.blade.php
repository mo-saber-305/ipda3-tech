@extends('front.layouts.app')

@section('style')
    <style>
        .news {
            padding: 0;
        }
        .news .articles {
            padding: 50px 0;
            background: url("{{ asset('front/imgs/articles.jpg') }}") no-repeat;
            background-size: contain;
        }
    </style>
@stop

@section('content')
    <section id="news" class="news">
        <div class="special-heading">
            <h2>المقالات</h2>
        </div>
        <div class="articles mt-5">
            <div class="container">
                <div class="row justify-content-around">
                    @foreach ($articles as $article)
                        <div class="col-md-5">
                            <div class="card hvr-glow">
                                <img class="card-img-top" src="{{ asset('storage/' . $article->image) }}" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $article->title }}</h4>
                                    <div class="news-action d-flex justify-content-between">
                                        <a class="btn btn-lg hvr-wobble-top" href="{{ route('front.articles.show', $article->id) }}" role="button">اقرأ الأن</a>
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
            </div>
            <!--Start Pagination-->
            <div class="container">
                <div class="row justify-content-center">
                    <nav aria-label="Page navigation example" dir="ltr">
                        <ul class="pagination mb-0 p-0">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!--End Pagination-->
        </div>
    </section>
@stop




