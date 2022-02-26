@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active">العملاء</li>
    </ol>
@stop

@section('page_title', 'العملاء')

@section('style')
    <style>
        .content .index-project .card .card-body .table tbody tr > td img {
            max-width: 100%;
        }

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
                        <h3 class="card-title">عملاء ابداع تك</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(count($clients))
                            @if (auth()->user()->hasPermission('create-clients'))
                                <a class="btn btn-primary mb-3" href="{{ route('dashboard.clients.create') }}"
                                   role="button">
                                    <i class="fas fa-plus"></i>
                                    انشاء عميل جديد
                                </a>
                            @else
                                <a class="btn btn-primary disabled" href="#" role="button">
                                    <i class="fas fa-plus"></i>
                                    انشاء عميل جديد
                                </a>
                            @endif
                            <table class="table table-bordered text-center">
                                <thead class="thead-dark">
                                <tr class="d-flex">
                                    <th class="col-1">#</th>
                                    <th class="col-3">الاسم</th>
                                    <th class="col-3">الصوره</th>
                                    <th class="col-3">رابط الموقع</th>
                                    <th class="col-2">اكشن</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr class="d-flex">
                                        <td class="col-1"><strong>{{$loop->iteration}}</strong></td>
                                        <td class="col-3">
                                            <h5 class="mb-0 text-bold">{{$client->name}}</h5>
                                        </td>
                                        <td class="col-3">
                                            <img src="{{asset($client->image)}}" height="80">
                                        </td>
                                        <td class="col-3 text-lowercase"><strong>{{$client->url}}</strong></td>
                                        <td class="col-2">
                                            @if (auth()->user()->hasPermission('update-clients'))
                                                <a class="btn btn-success mx-3"
                                                   href="{{ route('dashboard.clients.edit', $client->id) }}"
                                                   role="button" data-tooltip="tooltip"
                                                   data-placement="top" title="تعديل العميل"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-success mx-3 disabled">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            @endif
                                            @if (auth()->user()->hasPermission('delete-clients'))
                                                <form action="{{ route('dashboard.clients.destroy', $client->id) }}"
                                                      method="post" class="mb-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" data-tooltip="tooltip"
                                                            data-placement="top" title="حذف العميل">
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

                            {{ $clients->links() }}
                        @else
                            <div class="text-center">
                                <h3 class="mb-3">
                                    لا يوجد عملاء حاليا
                                </h3>

                                @if (auth()->user()->hasPermission('create-clients'))
                                    <a class="btn btn-primary" href="{{ route('dashboard.clients.create') }}"
                                       role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء عميل جديد
                                    </a>
                                @else
                                    <a class="btn btn-primary disabled" href="#" role="button">
                                        <i class="fas fa-plus"></i>
                                        انشاء عميل جديد
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
            $('[data-tooltip="tooltip"]').tooltip();
            $('table[data-form="deleteForm"]').on('click', '.form-delete', function (e) {
                e.preventDefault();
                var $form = $(this);
                $('#confirm').modal({backdrop: 'static', keyboard: false})
                    .on('click', '#delete-btn', function () {
                        $form.submit();
                    });
            });
        })
    </script>
@endsection
