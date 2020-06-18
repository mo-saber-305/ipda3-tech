@extends("dashboard.layouts.dashboard")

@section('page_title', 'المقالات المحذوفه')

@section('style')
    <style>
        .btn-info {
            margin-left: 10px;
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
                            <div class="col-12">
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
                                    @foreach($trashes as $trash)
                                        <tr class="d-flex">
                                            <td class="col-1"><strong>{{$loop->iteration}}</strong></td>
                                            <td class="col-5">
                                                <h5 class="mb-0 text-bold">{{$trash->title}}</h5>
                                            </td>
                                            <td class="col-2">
                                                <img src="{{asset('storage/' .$trash->image)}}" alt="...">
                                            </td>
                                            <td class="col-2"><span class="badge bg-dark">{{$trash->views}}</span></td>
                                            <td class="col-2">
                                                <a class="btn btn-info" href="{{ route('trashed.restore', $trash->id) }}" role="button"
                                                    data-tooltip="tooltip" data-placement="top" title="استعادة المقاله">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger "
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        data-tooltip="tooltip"
                                                        data-placement="top" title="حذف المقاله"
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
                                                                    سوف يتم حذف المقالة نهائيا <br>
                                                                    هل انت متأكد إنك تريد حذف المقالة ؟
                                                                </h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">إلغاء</button>
                                                                <form action="{{ route('articles.destroy', $trash->id) }}" method="post" class="mb-0">
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

@section('script')
    <script>
        $(function () {
            $('[data-tooltip="tooltip"]').tooltip()
        })
    </script>
@endsection


