@extends('front.layouts.app')

@section('style')
    <style>
        .show-article .card {
            border: 0;
        }
        .show-article .project-show .special-heading h2 {
            margin-right: 15px;
        }
        .show-article .project-show .project-details {
            background: url({{asset('images/details-bg.png')}});
        }
        .show-article .project-show .project-slider .kbd {
            margin-top: 50px;
        }
        .show-article .project-show .project-slider .kbd kbd {
            cursor: pointer;
            margin-left: 5px;
        }

        .show-article .project-show .project-details h5 {
            color: #fff;
            line-height: 1.7;
        }

        .show-article .project-show .project-slider #carousel {
            height: 550px;
        }
        .show-article .project-show .project-slider #carousel img {
            height: 550px;
            width: 400px;
            cursor: pointer;
            top: 80px !important;

        }
        .show-article .project-show .project-slider #carousel .carousel-center {
            top: 0 !important;
        }
    </style>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="show-article">
            <div class="container-fluid">
                <!-- Default box -->
                <div class="card main-content-card">
                    <div class="card-body">
                        <div class="project-show">
                            <div class="special-heading">
                                <h2>{{ $project->title }}</h2>
                            </div>
                            <div class="project-header">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 col-md-9 col-lg-7">
                                        <img src="{{ asset('storage/' .$project->cover_image) }}" class="w-100">
                                    </div>
                                </div>
                            </div>

                            <div class="special-heading">
                                <h2>تفاصيل المشروع</h2>
                            </div>
                            <div class="project-details mt-5 py-5">
                                <div class="container-fluid">
                                    <h5 class="text-center">{{ $project->content }}</h5>
                                </div>
                            </div>

                            <div class="project-slider">
                                <div class="special-heading">
                                    <h2>خدلك لفه</h2>
                                </div>
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-sm-12 col-md-8 col-lg-12">
                                        <div class="kbd text-center">
                                            <kbd id="next"><i class="fa fa-angle-left" aria-hidden="true"></i></kbd>
                                            <kbd id="prev"><i class="fa fa-angle-right" aria-hidden="true"></i></kbd>
                                        </div>

                                        <div id="carousel">
                                            @foreach ($project->photos()->get('project_images') as $photo)
                                                <img src="{{ asset('storage/' .$photo->project_images) }}"/>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var carousel = $("#carousel").waterwheelCarousel({
                flankingItems: 1,
            });

            $('#prev').bind('click', function () {
                carousel.prev();
                return false
            });

            $('#next').bind('click', function () {
                carousel.next();
                return false;
            });
        });
    </script>
@stop




