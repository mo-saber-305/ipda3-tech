@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.settings.index') }}">الاعدادات</a></li>
        <li class="breadcrumb-item active">تعديل الاعدادات</li>
    </ol>
@stop

@section('page_title', 'تعديل الاعدادات')

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
                        <h3 class="card-title">تعديل الاعدادات</h3>

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
                                        <form action="{{ route('dashboard.settings.update', $setting->id) }}"
                                              method="post"
                                              enctype="multipart/form-data"
                                        >
                                            @csrf
                                            @method('put')

                                            <div class="form-group">
                                                <label for="facebook_link">لينك facebook</label>
                                                <input type="text" name="facebook_link" id="facebook_link" class="form-control" placeholder="اكتب لينك facebook"
                                                       aria-describedby="helpId" value="{{ $setting->facebook }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="twitter_link">لينك twitter</label>
                                                <input type="text" name="twitter_link" id="twitter_link" class="form-control" placeholder="اكتب لينك twitter"
                                                       aria-describedby="helpId" value="{{ $setting->twitter }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram_link">لينك instagram</label>
                                                <input type="text" name="instagram_link" id="instagram_link" class="form-control" placeholder="اكتب لينك instagram"
                                                       aria-describedby="helpId" value="{{ $setting->instagram }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="linkedIn_link">لينك linkedIn</label>
                                                <input type="text" name="linkedIn_link" id="linkedIn_link" class="form-control" placeholder="اكتب لينك linkedIn"
                                                       aria-describedby="helpId" value="{{ $setting->linkedin }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="whatsApp_link">لينك whatsApp</label>
                                                <input type="text" name="whatsApp_link" id="whatsApp_link" class="form-control" placeholder="اكتب لينك whatsApp"
                                                       aria-describedby="helpId" value="{{ $setting->whatsapp }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="slogan">محتوي slogan</label>
                                                <textarea
                                                    class="form-control @error('slogan') is-invalid @enderror"
                                                    name="slogan" id="slogan" rows="5"
                                                    placeholder="اكتب المحتوي ..."
                                                >{{ $setting->slogan }}</textarea>
                                                @error('slogan')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="intro_image">صورة intro</label>
                                                <input type="file"
                                                       class="form-control-file @error('intro_image') is-invalid @enderror"
                                                       name="intro_image" id="intro_image"
                                                       aria-describedby="fileHelpId">
                                                @error('intro_image')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group text-center col-6 m-auto">
                                                <img src="{{ asset('storage/' .$setting->intro_image) }}"
                                                     style="max-width: 100%; max-height: 200px">
                                            </div>

                                            <div class="form-group">
                                                <label for="header_logo">صورة header logo</label>
                                                <input type="file"
                                                       class="form-control-file @error('header_logo') is-invalid @enderror"
                                                       name="header_logo" id="header_logo"
                                                       aria-describedby="fileHelpId">
                                                @error('header_logo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group text-center col-6 m-auto">
                                                <img src="{{ asset('storage/' .$setting->header_logo) }}"
                                                     style="max-width: 100%; max-height: 200px">
                                            </div>

                                            <div class="form-group">
                                                <label for="footer_logo">صورة footer logo</label>
                                                <input type="file"
                                                       class="form-control-file @error('footer_logo') is-invalid @enderror"
                                                       name="footer_logo" id="footer_logo"
                                                       aria-describedby="fileHelpId">
                                                @error('footer_logo')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group text-center col-6 m-auto">
                                                <img src="{{ asset('storage/' .$setting->footer_logo) }}"
                                                     style="max-width: 100%; max-height: 200px">
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button type="submit" class="btn btn-success">تعديل الاعدادات</button>
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
