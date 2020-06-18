@extends("dashboard.layouts.dashboard")

@inject('article', "App\Models\Article")

@section('page_title', 'المقالات')

@section('style')
    <style>
        .content .index-article .card .card-body .table tbody tr > td {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content .index-article .card .card-body .table tbody tr > td img {
            max-width: 100%;
        }

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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include("dashboard.includes.messages")
                        @if(count($articles))
                            <div class="d-flex justify-content-between mb-4">
                                <a class="btn btn-primary" href="{{ route('articles.create') }}" role="button">
                                    <i class="fas fa-plus"></i>
                                    انشاء مقاله جديده
                                </a>
                                <a class="btn btn-info text-light" href="{{ route('trashed.index') }}" role="button">
                                    <i class="fas fa-trash"></i>
                                    المقالات المحذوفه
                                </a>
                            </div>
                            <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-1">#</th>
                                        <th class="col-5">العنوان</th>
                                        <th class="col-2">الصوره</th>
                                        <th class="col-2">المشاهدات</th>
                                        <th class="col-2">التفاصيل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $article)
                                        <tr class="d-flex">
                                            <td class="col-1"><strong>{{$loop->iteration}}</strong></td>
                                            <td class="col-5">
                                                <h5 class="mb-0 text-bold">{{$article->title}}</h5>
                                            </td>
                                            <td class="col-2">
                                                <img src="{{asset('storage/' .$article->image)}}" alt="...">
                                            </td>
                                            <td class="col-2"><span class="badge bg-dark">{{$article->views}}</span></td>
                                            <td class="col-2 d-flex justify-content-between">
                                                <a class="btn btn-primary"
                                                   href="{{ route('articles.show', $article->id) }}"
                                                   role="button" data-toggle="tooltip"
                                                   data-placement="top" title="فتح المقاله">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-success"
                                                   href="{{ route('articles.edit', $article->id) }}"
                                                   role="button" data-toggle="tooltip"
                                                   data-placement="top" title="تعديل المقاله"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                                                            data-placement="top" title="حذف المقاله">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            {{ $articles->links() }}
                        @else
                            <div class="text-center">
                                <h3 class="mb-3">
                                    لا توجد مقالات حاليا
                                </h3>
                                <a class="btn btn-primary ml-3" href="{{ route('articles.create') }}" role="button">
                                    <i class="fas fa-plus"></i>
                                    انشاء مقالة جديده
                                </a>
                                <a class="btn btn-info text-light" href="{{ route('trashed.index') }}" role="button">
                                    <i class="fas fa-trash"></i>
                                    المقالات المحذوفه
                                </a>
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
