@extends('front.layouts.app')

@section('style')
    <style>
        .some-works {
            margin-top: 0;
        }

        .some-works, .my-works {
            background: url("{{ asset('front/imgs/bg30-Ar1web.gif') }}");
        }

        .my-works {
            padding: 65px 0;
        }
    </style>
@stop

@section('content')
    <section id="some-works" class="some-works">
        <div class="special-heading">

            <h2>أعمالنا</h2>
        </div>
        <section class="my-works">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <a href="">
                            <div class="card hvr-grow-shadow">
                                <img class="card-img-top" src="{{ asset('front/imgs/blood-bank.jpg') }}" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">تطبيق بنك الدم</h4>
                                </div>
                            </div>
                        </a>
                    </div>
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
        </section>
    </section>
@stop




