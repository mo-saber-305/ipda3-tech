@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.projects.index') }}">المشاريع</a></li>
        <li class="breadcrumb-item active">
            {{ isset($project) ? 'تعديل المشروع' : 'انشاء مشروع جديد' }}
        </li>
    </ol>
@stop

@section('page_title')
    {{ isset($project) ? 'تعديل المشروع' : 'انشاء مشروع جديد' }}
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Default box -->
            <div class="card main-content-card">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($project) ? 'تعديل المشروع' : 'انشاء مشروع جديد' }}</h3>

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
                                        action="{{ isset($project) ? route('dashboard.projects.update', $project->id) : route('dashboard.projects.store') }}"
                                        method="post"
                                        enctype="multipart/form-data"
                                    >
                                        @csrf
                                        @isset($project)
                                            @method('put')
                                        @endisset
                                        <div class="form-group">
                                            <label for="title">العنوان</label>
                                            <input type="text" name="title" id="title"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   placeholder="اكتب العنوان ..."
                                                   aria-describedby="helpId"
                                                   value="{{ isset($project) ? $project->title : old('title') }}">
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
                                            >{{ isset($project) ? $project->content : old('content') }}</textarea>
                                            @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image">صورة المشروع الاساسيه</label>
                                            <input type="file"
                                                   class="form-control-file @error('image') is-invalid @enderror"
                                                   name="image" id="image"
                                                   value="{{ old('image') }}"
                                                   placeholder="اختار صورة للمقال" aria-describedby="fileHelpId">
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        @isset($project)
                                            <div class="form-group text-center">
                                                <img src="{{ asset($project->image) }}"
                                                     style="max-width: 100%">
                                            </div>
                                        @endisset
                                        <div class="form-group">
                                            <label for="cover_image">صورة خلفية المشروع</label>
                                            <input type="file"
                                                   class="form-control-file @error('cover_image') is-invalid @enderror"
                                                   name="cover_image" id="cover_image"
                                                   value="{{ old('cover_image') }}"
                                                   placeholder="اختار صورة للمقال" aria-describedby="fileHelpId">
                                            @error('cover_image')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        @isset($project)
                                            <div class="form-group text-center">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-8">
                                                        <img src="{{ asset($project->cover_image) }}"
                                                             style="max-width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                        @endisset
                                        <div class="form-group">
                                            <label for="project_images">صور المشروع</label>
                                            <input type="file"
                                                   class="form-control-file @error('project_images') is-invalid @enderror"
                                                   name="project_images[]" id="project_images"
                                                   aria-describedby="fileHelpId"
                                                   multiple>
                                            @error('project_images')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        @isset($project)
                                            <div class="row justify-content-center">
                                                @foreach ($project->photos()->get() as $photo)
                                                    <div class="col-lg-4 mb-4">
                                                        <img src="{{ asset($photo->image) }}"
                                                             style="max-width: 100%"/>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endisset
                                        <div class="form-group text-center">
                                            <button type="submit"
                                                    class="btn btn-primary @isset($project) btn-success @endisset">
                                                {{ isset($project) ? 'تعديل المشروع' : 'انشاء المشروع' }}
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
