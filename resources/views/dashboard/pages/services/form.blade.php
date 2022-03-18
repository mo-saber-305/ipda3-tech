@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.services.index') }}">الخدمات</a></li>
        <li class="breadcrumb-item active">
            {{ isset($service) ? 'تعديل الخدمة' : 'انشاء خدمة جديده' }}
        </li>
    </ol>
@stop

@section('page_title')
    {{ isset($service) ? 'تعديل الخدمة' : 'انشاء خدمة جديده' }}
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
                    <h3 class="card-title">{{ isset($service) ? 'تعديل معلومات الخدمة' : 'انشاء خددمة جديده' }}</h3>

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
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <form
                                        action="{{ isset($service) ? route('dashboard.services.update', $service->id) : route('dashboard.services.store') }}"
                                        method="post"
                                        enctype="multipart/form-data"
                                    >
                                        @csrf
                                        @isset($service)
                                            @method('put')
                                        @endisset
                                        <div class="form-group">
                                            <label for="title">اسم الخدمة</label>
                                            <input type="text" name="title" id="title"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   placeholder="اكتب الاسم ..."
                                                   aria-describedby="helpId"
                                                   value="{{ isset($service) ? $service->title : old('title') }}">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="content">محتوي الخدمة</label>
                                            <textarea
                                                class="form-control @error('content') is-invalid @enderror"
                                                name="content" id="content" rows="5"
                                                placeholder="اكتب المحتوي ..."
                                            >{{ isset($service) ? $service->content : old('content') }}</textarea>
                                            @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="status">حالة الخدمة</label>
                                            <select
                                                class="custom-select"
                                                name="status" id="status"
                                            >
                                                <option
                                                    value="1"

                                                    @isset($service)
                                                    @if($service->status == 1)
                                                    selected
                                                    @endif
                                                    @endisset
                                                >
                                                    اظهار الخدمة
                                                </option>
                                                <option value="0"
                                                        @isset($service)
                                                        @if($service->status == 0)
                                                        selected
                                                    @endif
                                                    @endisset
                                                >
                                                    اخفاء الخدمة
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="image">صورة الخدمة</label>
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

                                        @isset($service)
                                            <div class="form-group text-center">
                                                <img src="{{ asset($service->image) }}" style="max-width: 100%">
                                            </div>
                                        @endisset

                                        <div class="form-group mb-0 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary @isset($service) btn-success @endisset">
                                                {{ isset($service) ? 'تعديل الخدمة' : 'انشاء الخدمة' }}
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
