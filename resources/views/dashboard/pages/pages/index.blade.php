@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active">العملاء</li>
    </ol>
@stop

@section('page_title', 'الصفحات')

@section('style')
    <style>
        .content .index-article .card .card-body .table tbody tr > td .badge {
            padding: 7px 10px;
        }
        .content .index-article .card .card-body .table tbody tr > td .btn-success {
            margin-left: 15px;
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
                        <h3 class="card-title">صفحات ابداع تك</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include("dashboard.includes.messages")

                        @if(count($pages))
                            <div class="d-flex justify-content-between mb-4">
                                @if (auth()->user()->hasPermission('create-pages'))
                                    <a class="btn btn-primary" href="{{ route('dashboard.pages.create') }}" role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء صفحة جديده
                                    </a>
                                @else
                                    <a class="btn btn-primary ml-3 disabled" href="#" role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء صفحة جديده
                                    </a>
                                @endif
                            </div>
                            <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-1">#</th>
                                        <th class="col-5">العنوان</th>
                                        <th class="col-2">الصوره</th>
                                        <th class="col-2">الحاله</th>
                                        <th class="col-2">التفاصيل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr class="d-flex">
                                            <td class="col-1"><strong>{{$loop->iteration}}</strong></td>
                                            <td class="col-5">
                                                <h5 class="mb-0 text-bold">{{$page->title}}</h5>
                                            </td>
                                            <td class="col-2">
                                                <img src="{{asset('storage/' .$page->image)}}" alt="...">
                                            </td>
                                            <td class="col-2">
                                                <span class="badge bg-dark">
                                                    {{ $page->show_in_menu == 1 ? 'ظاهر'  : 'مخفي' }}
                                                </span>
                                            </td>
                                            <td class="col-2">
{{--                                                <a class="btn btn-primary"--}}
{{--                                                   href="{{ route('pages.show', $page->id) }}"--}}
{{--                                                   role="button" data-toggle="tooltip"--}}
{{--                                                   data-placement="top" title="فتح المقاله">--}}
{{--                                                    <i class="fas fa-eye"></i>--}}
{{--                                                </a>--}}
                                                @if (auth()->user()->hasPermission('create-pages'))
                                                    <a class="btn btn-success"
                                                       href="{{ route('dashboard.pages.edit', $page->id) }}"
                                                       role="button" data-tooltip="tooltip"
                                                       data-placement="top" title="تعديل الصفحة"
                                                    >
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @else
                                                    <button class="btn btn-success disabled">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endif

                                                @if (auth()->user()->hasPermission('create-pages'))
                                                    <form action="{{ route('dashboard.pages.destroy', $page->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" data-tooltip="tooltip"
                                                                data-placement="top" title="حذف الصفحة">
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

                            {{ $pages->links() }}
                        @else
                            <div class="text-center">
                                <h3 class="mb-3">
                                    لا توجد صفحات حاليا
                                </h3>
                                @if (auth()->user()->hasPermission('create-pages'))
                                    <a class="btn btn-primary ml-3" href="{{ route('dashboard.pages.create') }}" role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء صفحة جديده
                                    </a>
                                @else
                                    <a class="btn btn-primary ml-3 disabled" href="#" role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء صفحة جديده
                                    </a>
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
