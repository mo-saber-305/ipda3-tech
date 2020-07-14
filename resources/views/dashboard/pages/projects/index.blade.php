@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active">المشاريع</li>
    </ol>
@stop


@section('page_title', 'المشاريع')

@section('style')
    <style>
        .content .index-project .card .card-body .pagination {
            margin-top: 25px;
            margin-bottom: 0;
            justify-content: center;
        }
    </style>
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="index-project">
            <div class="container-fluid">
                <!-- Default box -->
                <div class="card main-content-card">
                    <div class="card-header">
                        <h3 class="card-title">مشاريع ابداع تك</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include("dashboard.includes.messages")
                        @if(count($projects))
                            @if (auth()->user()->hasPermission('create-projects'))
                                <a class="btn btn-primary mb-3" href="{{ route('dashboard.projects.create') }}" role="button">
                                    <i class="fas fa-plus"></i>
                                    انشاء مشروع جديد
                                </a>
                            @else
                                <button class="btn btn-primary mb-3 disabled">
                                    <i class="fas fa-plus"></i>
                                    انشاء مشروع جديد
                                </button>
                            @endif
                            <table class="table table-bordered text-center">
                                <thead class="thead-dark">
                                <tr class="d-flex">
                                    <th class="col-1">#</th>
                                    <th class="col-5">العنوان</th>
                                    <th class="col-3">الصوره</th>
                                    <th class="col-3">التفاصيل</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr class="d-flex">
                                        <td class="col-1"><strong>{{$loop->iteration}}</strong></td>
                                        <td class="col-5">
                                            <h5 class="mb-0 text-bold">{{$project->title}}</h5>
                                        </td>
                                        <td class="col-3">
                                            <img src="{{asset('storage/' .$project->image)}}" alt="...">
                                        </td>
                                        <td class="col-3">
                                            <a class="btn btn-primary"
                                               href="{{ route('dashboard.projects.show', $project->id) }}"
                                               role="button" data-toggle="tooltip"
                                               data-placement="top" title="فتح المشروع">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            @if (auth()->user()->hasPermission('update-projects'))
                                                <a class="btn btn-success mx-3"
                                                   href="{{ route('dashboard.projects.edit', $project->id) }}"
                                                   role="button" data-toggle="tooltip"
                                                   data-placement="top" title="تعديل المشروع"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-success mx-3 disabled">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            @endif

                                            @if (auth()->user()->hasPermission('delete-projects'))
                                                <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="post" class="mb-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
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

                            {{ $projects->links() }}
                        @else
                            <div class="text-center">
                                <h3 class="mb-3">
                                    لا توجد مشاريع حاليا
                                </h3>

                                @if (auth()->user()->hasPermission('create-projects'))
                                    <a class="btn btn-primary" href="{{ route('dashboard.projects.create') }}" role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء مشروع جديد
                                    </a>
                                @else
                                    <button class="btn btn-primary disabled">
                                        <i class="fas fa-plus"></i>
                                        انشاء مشروع جديد
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

