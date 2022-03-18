@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.articles.index') }}">المقالات</a></li>
        <li class="breadcrumb-item active">
            {{ isset($article) ? 'تعديل المقالة' : 'انشاء مقالة جديده' }}
        </li>
    </ol>
@stop


@section('page_title')
    {{ isset($article) ? 'تعديل المقالة' : 'انشاء مقالة جديده' }}
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card main-content-card">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($article) ? 'تعديل المقالة' : 'انشاء مقالة جديده' }}</h3>

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
                                        action="{{ isset($article) ? route('dashboard.articles.update', $article->id) : route('dashboard.articles.store') }}"
                                        method="post"
                                        enctype="multipart/form-data"
                                    >
                                        @csrf
                                        @isset($article)
                                            @method('put')
                                        @endisset
                                        <div class="form-group">
                                            <label for="title">العنوان</label>
                                            <input type="text" name="title" id="title"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   placeholder="اكتب العنوان ..."
                                                   aria-describedby="helpId"
                                                   value="{{ isset($article) ? $article->title : old('title') }}">
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
                                            >{{ isset($article) ? $article->content : old('content') }}</textarea>
                                            @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image">الصورة</label>
                                            <input type="file"
                                                   class="form-control-file @error('image') is-invalid @enderror"
                                                   name="image" id="image"
                                                   value="{{ old('image') }}"
                                                   placeholder="اختار صورة للمقال" aria-describedby="fileHelpId"
                                                   multiple>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        @isset($article)
                                            <div class="form-group text-center">
                                                <img src="{{ asset($article->image) }}" alt="..."
                                                     style="max-width: 100%" height="200">
                                            </div>
                                        @endisset
                                        <div class="form-group text-center">
                                            <button type="submit"
                                                    class="btn btn-primary @isset($article) btn-success @endisset">
                                                {{ isset($article) ? 'تعديل المقاله' : 'انشاء المقالة' }}
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
        </div>
    </section>
    <!-- /.content -->
@endsection
