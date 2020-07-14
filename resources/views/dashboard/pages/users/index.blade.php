@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active">المشرفين</li>
    </ol>
@stop

@section('page_title', 'المشرفين')

@section('style')
    <style>
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
                        <h3 class="card-title">مشرفين ابداع تك</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include("dashboard.includes.messages")
                        @if(count($users))
                            <div class="d-flex justify-content-between mb-4">
                                @if (auth()->user()->hasPermission('create-users'))
                                    <a class="btn btn-primary" href="{{ route('dashboard.users.create') }}" role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء مشرف جديد
                                    </a>
                                @else
                                    <a class="btn btn-primary disabled" href="#" role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء مشرف جديد
                                    </a>
                                @endif
                            </div>
                            <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                    <tr class="d-flex">
                                        <th class="col-1">#</th>
                                        <th class="col-4">الاسم</th>
                                        <th class="col-4">الايميل</th>
                                        <th class="col-3">التفاصيل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr class="d-flex">
                                            <td class="col-1"><strong>{{$loop->iteration}}</strong></td>
                                            <td class="col-4">
                                                <h5 class="mb-0 text-bold">{{$user->name}}</h5>
                                            </td>
                                            <td class="col-4 text-lowercase">{{ $user->email }}</td>
                                            <td class="col-3">
                                                @if (auth()->user()->hasPermission('update-users'))
                                                    <a class="btn btn-success ml-3"
                                                       href="{{ route('dashboard.users.edit', $user->id) }}"
                                                       role="button" data-toggle="tooltip"
                                                       data-placement="top" title="تعديل المشرف"
                                                    >
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @else
                                                    <a class="btn btn-success ml-3 disabled" href="#"
                                                       role="button">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endif

                                                @if (auth()->user()->hasPermission('delete-users'))
                                                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Sure Want Delete?')" class="btn btn-danger" data-toggle="tooltip"
                                                                data-placement="top" title="حذف المشرف">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a class="btn btn-danger disabled" href="#"
                                                       role="button">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        @else
                            <div class="text-center">
                                <h3 class="mb-3">
                                    لا يوجد مشرفين حاليا
                                </h3>
                                @if (auth()->user()->hasPermission('create-users'))
                                    <a class="btn btn-primary ml-3" href="{{ route('dashboard.users.create') }}" role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء مشرف جديد
                                    </a>
                                @else
                                    <a class="btn btn-primary ml-3 disabled" href="#" role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء مشرف جديد
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

@section('script')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
