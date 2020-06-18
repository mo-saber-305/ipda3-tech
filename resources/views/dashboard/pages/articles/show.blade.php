@extends("dashboard.layouts.dashboard")

@section('page_title', 'تفاصيل المقالة')

@section('style')
    <style>
        .article-show-card {
            border-radius: 30px;
        }
        .article-show-card .card-img-top {
            border-radius: 25px;
        }
        .article-show-card .card-title {
            line-height: 2.2;
            font-size: 25px;
            color: #233142;
        }
        .article-show-card span.badge {
            width: fit-content;
            margin-right: auto;
            padding: 7px 10px;
            font-size: 18px;
        }
        .article-show-card span.badge i {
            padding-right: 4px;
        }
    </style>
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="show-article">
            <div class="container-fluid">
                <!-- Default box -->
                <div class="card main-content-card">
                    <div class="card-header">
                        <h3 class="card-title">تفاصيل المقالة</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 col-md-10">
                                <div class="card article-show-card text-center my-4 py-5 px-sm-3 hvr-glow">
                                    <div class="header-card d-flex justify-content-center mb-4">
                                        <div class="col-sm-12 col-md-10 col-lg-7">
                                            <img class="card-img-top hvr-glow" src="{{ asset('storage/' .$article->image) }}" >
                                        </div>
                                    </div>
                                    <h3 class="font-weight-bold">{{ $article->title }}</h3>
                                    <h4 class="card-title">{{ $article->content }}</h4>

                                    <span class="badge badge-dark">
                                    {{ $article->views }}
                                    <i class="fas fa-eye"></i>
                                </span>
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
