@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active">المقالات</li>
    </ol>
@stop


@section('page_title', 'المقالات')

@section('style')
    <style>
        .content .index-article .card .card-body .table tbody tr > td .badge {
            padding: 7px 10px;
        }

        .content .index-article .card .card-body .pagination {
            margin-top: 25px;
            margin-bottom: 0;
            justify-content: center;
        }
    </style>
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="index-article">
            <div class="container-fluid">
                <!-- Default box -->
                <div class="card main-content-card">
                    <div class="card-header">
                        <h3 class="card-title">مقالات ابداع تك</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(count($articles))
                            <div class="d-flex justify-content-between mb-4">
                                @if (auth()->user()->hasPermission('create-articles'))
                                    <a class="btn btn-primary" href="{{ route('dashboard.articles.create') }}"
                                       role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء مقاله جديده
                                    </a>
                                @else
                                    <button class="btn btn-primary disabled">
                                        <i class="fas fa-plus"></i>
                                        انشاء مقالة جديده
                                    </button>
                                @endif
                                @if (auth()->user()->hasPermission('delete-articles'))
                                    <a class="btn btn-info text-light" href="{{ route('dashboard.trashed.index') }}"
                                       role="button">
                                        <i class="fas fa-trash"></i>
                                        المقالات المحذوفه
                                    </a>
                                @else
                                    <button class="btn  btn-info text-light disabled">
                                        <i class="fas fa-trash"></i>
                                        المقالات المحذوفه
                                    </button>
                                @endif
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center mb-0" style="width: 100%">
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
                                    @foreach($articles as $article)
                                        <tr class="d-flex">
                                            <td class="col-sm-1"><strong>{{$loop->iteration}}</strong></td>
                                            <td class="col-sm-4">
                                                <h5 class="mb-0 text-bold">{{$article->title}}</h5>
                                            </td>
                                            <td class="col-sm-2">
                                                <img src="{{asset($article->image)}}" alt="...">
                                            </td>
                                            <td class="col-sm-2"><span class="badge bg-dark">{{$article->views}}</span>
                                            </td>
                                            <td class="col-sm-3">
                                                <a class="btn btn-primary"
                                                   href="{{ route('dashboard.articles.show', $article->id) }}"
                                                   role="button" data-toggle="tooltip"
                                                   data-placement="top" title="فتح المقاله">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if (auth()->user()->hasPermission('update-articles'))
                                                    <a class="btn btn-success mx-3"
                                                       href="{{ route('dashboard.articles.edit', $article->id) }}"
                                                       role="button" data-toggle="tooltip"
                                                       data-placement="top" title="تعديل المقاله"
                                                    >
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @else
                                                    <button class="btn btn-success mx-3 disabled">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endif

                                                @if (auth()->user()->hasPermission('delete-articles'))
                                                    <form
                                                        action="{{ route('dashboard.articles.destroy', $article->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                                data-toggle="tooltip"
                                                                data-placement="top" title="حذف المقاله">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <button class="btn btn-danger disabled">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $articles->links() }}
                        @else
                            <div class="text-center">
                                <h3 class="mb-3">
                                    لا توجد مقالات حاليا
                                </h3>
                                @if (auth()->user()->hasPermission('create-articles'))
                                    <a class="btn btn-primary ml-3" href="{{ route('dashboard.articles.create') }}"
                                       role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء مقالة جديده
                                    </a>
                                @else
                                    <button class="btn btn-primary ml-3 disabled">
                                        <i class="fas fa-plus"></i>
                                        انشاء مقالة جديده
                                    </button>
                                @endif
                                @if (auth()->user()->hasPermission('delete-articles'))
                                    <a class="btn btn-info text-light" href="{{ route('dashboard.trashed.index') }}"
                                       role="button">
                                        <i class="fas fa-trash"></i>
                                        المقالات المحذوفه
                                    </a>
                                @else
                                    <button class="btn  btn-info text-light disabled">
                                        <i class="fas fa-trash"></i>
                                        المقالات المحذوفه
                                    </button>
                                @endif
                            </div>
                        @endif
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
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
