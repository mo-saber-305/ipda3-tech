@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.pages.index') }}">العملاء</a></li>
        <li class="breadcrumb-item active">
            {{ isset($page) ? 'تعديل الصفحة' : 'انشاء صفحة جديده' }}
        </li>
    </ol>
@stop

@section('page_title')
    {{ isset($page) ? 'تعديل الصفحة' : 'انشاء صفحة جديده' }}
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <!-- Default box -->
                <div class="card main-content-card">
                    <div class="card-header">
                        <h3 class="card-title">{{ isset($page) ? 'تعديل الصفحة' : 'انشاء صفحة جديده' }}</h3>

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
                            <div class="col-8">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <form action="{{ isset($page) ? route('dashboard.pages.update', $page->id) : route('dashboard.pages.store') }}"
                                              method="post"
                                              enctype="multipart/form-data"
                                        >
                                            @csrf
                                            @isset($page)
                                                @method('put')
                                            @endisset
                                            <div class="form-group">
                                                <label for="title">العنوان</label>
                                                <input type="text" name="title" id="title"
                                                       class="form-control @error('title') is-invalid @enderror"
                                                       placeholder="اكتب العنوان ..."
                                                       aria-describedby="helpId"
                                                       value="{{ isset($page) ? $page->title : old('title') }}">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="content">المحتوي</label>
                                                <textarea
                                                    class="form-control @error('content') is-invalid @enderror"
                                                    name="content" id="content" rows="5"
                                                    placeholder="اكتب المحتوي ..."
                                                >{{ isset($page) ? $page->content : old('content') }}</textarea>
                                                @error('content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="show_in_menu">الحاله</label>
                                                    <select class="form-control custom-select" name="show_in_menu" id="show_in_menu">
                                                        <option value="1"
                                                                @isset($page)
                                                                @if ($page->show_in_menu == 1)
                                                                selected
                                                            @endif
                                                            @endisset
                                                        >اظهار في القائمه</option>
                                                        <option value="0"
                                                                @isset($page)
                                                                @if ($page->show_in_menu == 0)
                                                                selected
                                                            @endif
                                                            @endisset
                                                        >اخفاء من القائمه</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="image">الصورة</label>
                                                    <input type="file"
                                                           class="form-control-file @error('image') is-invalid @enderror"
                                                           name="image" id="image"
                                                           value="{{ old('image') }}"
                                                           placeholder="اختار صورة للمقال" aria-describedby="fileHelpId" multiple>
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @isset($page)
                                                <div class="form-group text-center">
                                                    <img src="{{ asset('storage/' .$page->image) }}" style="max-width: 100%">
                                                </div>
                                            @endisset
                                            <div class="form-group text-center mb-0">
                                                <button type="submit" class="btn btn-primary @isset($page) btn-success @endisset">
                                                    {{ isset($page) ? 'تعديل الصفحة' : 'انشاء الصفحة' }}
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
