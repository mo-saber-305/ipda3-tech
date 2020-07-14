@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.articles.index') }}">المقالات</a></li>
        <li class="breadcrumb-item active">المقالات المحذوفه</li>
    </ol>
@stop


@section('page_title', 'المقالات المحذوفه')

@section('style')
    <style>
        .content .index-article .card .card-body .table tbody tr > td .btn-info {
            margin-left: 10px;
        }
        .content .index-article .card .card-body .table tbody tr > td .badge {
            padding: 7px 10px;
        }
    </style>
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="index-article">
            <div class="container-fluid">
                <!-- .card -->
                <div class="card main-content-card">
                    <div class="card-header">
                        <h3 class="card-title">مقالات ابداع تك المحذوفه</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        @include("dashboard.includes.messages")
                        @if(count($trashes))
                            <div class="table-responsive">
                                <table class="table table-bordered text-center mb-0">
                                    <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-sm-1">#</th>
                                        <th class="col-sm-4">العنوان</th>
                                        <th class="col-sm-2">الصوره</th>
                                        <th class="col-sm-2">المشاهدات</th>
                                        <th class="col-sm-3">التفاصيل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($trashes as $trash)
                                        <tr class="d-flex">
                                            <td class="col-sm-1"><strong>{{$loop->iteration}}</strong></td>
                                            <td class="col-sm-4">
                                                <h5 class="mb-0 text-bold">{{$trash->title}}</h5>
                                            </td>
                                            <td class="col-sm-2">
                                                <img src="{{asset('storage/' .$trash->image)}}" alt="..." style="max-width: 100%" height="80">
                                            </td>
                                            <td class="col-sm-2"><span class="badge bg-dark">{{$trash->views}}</span></td>
                                            <td class="col-sm-3">
                                                <a class="btn btn-info" href="{{ route('dashboard.trashed.restore', $trash->id) }}" role="button"
                                                   data-tooltip="tooltip" data-placement="top" title="استعادة المقاله">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('dashboard.articles.destroy', $trash->id) }}" method="post" class="mb-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" data-tooltip="tooltip"
                                                            data-placement="top" title="حذف المقاله">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center">
                                <h3 class="my-3">
                                    لا توجد مقالات محذوفه حاليا
                                </h3>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection



