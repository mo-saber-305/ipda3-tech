@extends("dashboard.layouts.dashboard")

@section('page_title', 'الاعدادات')

@section('style')
    <style>
        .content .index-project .card .card-body .table tbody tr > td {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content .index-project .card .card-body .table tbody tr > td img {
            max-width: 100%;
        }
        .content .index-project .card .card-body .table tbody tr > td .btn-success {
            margin-left: 15px;
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
                        <h3 class="card-title">اعدادات ابداع تك</h3>

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
                        @if(count($settings))
                            <a class="btn btn-primary mb-3" href="{{ route('settings.create') }}" role="button">
                                <i class="fas fa-plus"></i>
                                انشاء خدمة جديده
                            </a>
                            <table class="table table-bordered text-center">
                                <thead class="thead-dark">
                                <tr class="d-flex">
                                    <th class="col-4">slogan</th>
                                    <th class="col-2">intro image</th>
                                    <th class="col-2">header logo</th>
                                    <th class="col-2">footer logo</th>
                                    <th class="col-2">التفاصيل</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($settings as $setting)
                                    <tr class="d-flex">
                                        <td class="col-4">{{$setting->slogan}}</td>
                                        <td class="col-2">
                                            <img src="{{asset('storage/' .$setting->intro_image)}}" height="100">
                                        </td>
                                        <td class="col-2">
                                            <img src="{{asset('storage/' .$setting->header_logo)}}" height="100">
                                        </td>
                                        <td class="col-2">
                                            <img src="{{asset('storage/' .$setting->footer_logo)}}" height="100">
                                        </td>
                                        <td class="col-2">
                                            <a class="btn btn-success "
                                               href="{{ route('settings.edit', $setting->id) }}"
                                               role="button" data-toggle="tooltip"
                                               data-placement="top" title="تعديل الاعدادات"
                                            >
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger "
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    data-tooltip="tooltip"
                                                    data-placement="top" title="حذف الاعدادات"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                <strong>تحذير هام</strong>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="mb-0">
                                                                سوف يتم حذف هذه الاعدادات نهائيا <br>
                                                                هل انت متأكد إنك تريد حذف الاعدادات ؟
                                                            </h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">إلغاء</button>
                                                            <form action="{{ route('settings.destroy', $setting->id) }}" method="post" class="mb-0">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">حذف</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center">
                                <h3 class="mb-3">
                                    لا توجد اعدادات حاليا
                                </h3>
                                <a class="btn btn-primary" href="{{ route('settings.create') }}" role="button">
                                    <i class="fas fa-plus"></i>
                                    انشاء اعدادات جديده
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
