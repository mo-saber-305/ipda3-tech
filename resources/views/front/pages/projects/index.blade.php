@extends('front.layouts.app')

@section('style')
    <style>
        .some-works {
            margin-top: 0;
        }

        .some-works, .my-works {
            background: url("{{ asset('images/bg30-Ar1web.gif') }}");
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
            </div>

            <!--Start Pagination-->

            <div class="container">
                <div class="row justify-content-center">
                    {{ $projects->links() }}
                </div>
            </div>

            <!--End Pagination-->
        </section>
    </section>
@stop




