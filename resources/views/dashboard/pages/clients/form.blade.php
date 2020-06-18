@extends("dashboard.layouts.dashboard")

@section('page_title')
    {{ isset($client) ? 'تعديل بيانات العميل' : 'انشاء عميل جديد' }}
@stop

@section('style')
    <style>
        .content form .form-control.is-invalid {
            padding-right: 12px;
        }
    </style>
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <!-- Default box -->
                <div class="card main-content-card">
                    <div class="card-header">
                        <h3 class="card-title">{{ isset($client) ? 'تعديل بيانات العميل' : 'انشاء عميل جديد' }}</h3>

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
                        <div class="row justify-content-center">
                            <div class="col-9">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <form action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}"
                                              method="post"
                                              enctype="multipart/form-data"
                                        >
                                            @csrf
                                            @isset($client)
                                                @method('put')
                                            @endisset
                                            <div class="form-group">
                                                <label for="name">اسم العميل</label>
                                                <input type="text" name="name" id="name"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       placeholder="اكتب الاسم ..."
                                                       aria-describedby="helpId"
                                                       value="{{ isset($client) ? $client->name : old('name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="image">صورة العميل</label>
                                                <input type="file"
                                                       class="form-control-file @error('image') is-invalid @enderror"
                                                       name="image" id="image"
                                                       aria-describedby="fileHelpId">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            @isset($client)
                                                <div class="form-group text-center">
                                                    <img src="{{ asset('storage/' .$client->image) }}" style="max-width: 100%">
                                                </div>
                                            @endisset
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-primary @isset($client) btn-success @endisset">
                                                    {{ isset($client) ? 'تعديل العميل' : 'انشاء العميل' }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
</div>
    </section>
    <!-- /.content -->
@endsection
