@extends('dashboard.layouts.dashboard')

@inject("client", "App\Models\Client")
@inject("project", "App\Models\Project")
@inject("article", "App\Models\Article")
@inject("service", "App\Models\Service")

@section('page_title', 'Dashboard')

@section('style')
    <style>
        .home-widgets {
            margin-bottom: 40px;
        }
        .home-widgets .info-box .info-box-text {
            font-weight: bold;
        }
    </style>
@stop

@section('dashboard-content')
<div class="home-page">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="home-widgets">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">العملاء</span>
                                <span class="info-box-number">{{ $client->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-laptop"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">المشاريع</span>
                                <span class="info-box-number">{{ $project->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-gradient-navy"><i class="far fa-newspaper"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">المقالات</span>
                                <span class="info-box-number">{{ $article->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-dark"><i class="fas fa-praying-hands"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">الخدمات</span>
                                <span class="info-box-number">{{ $service->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>

            </div>

            <!-- Default box -->
            <div class="card main-content-card">
                <div class="card-header">
                    <h3 class="card-title">الصفحة الرئيسية</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body text-center">
                    You are logged in!
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
