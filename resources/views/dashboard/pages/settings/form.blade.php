@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
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
                                    <form action="{{ route('dashboard.settings.update', $setting->id) }}"
                                          method="post"
                                          enctype="multipart/form-data"
                                    >
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <label for="site_icon">ايقونة الموقع</label>
                                            <input type="file"
                                                   class="form-control-file @error('site_icon') is-invalid @enderror"
                                                   name="site_icon" id="site_icon"
                                                   aria-describedby="fileHelpId">
                                            @error('site_icon')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group text-center col-6 m-auto">
                                            <img src="{{ asset($setting->site_icon) }}"
                                                 style="max-width: 100%; max-height: 200px">
                                        </div>

                                        <div class="form-group">
                                            <label for="address">العنوان</label>
                                            <input type="text" name="address" id="address"
                                                   class="form-control @error('address') is-invalid @enderror"
                                                   placeholder="اكتب لينك whatsApp"
                                                   aria-describedby="helpId" value="{{ $setting->address }}">

                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="slogan_content">محتوي slogan</label>
                                            <textarea
                                                class="form-control @error('slogan_content') is-invalid @enderror"
                                                name="slogan_content" id="slogan_content" rows="5"
                                                placeholder="اكتب المحتوي ..."
                                            >{{ $setting->slogan_content }}</textarea>
                                            @error('slogan_content')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="slogan_image">صورة slogan</label>
                                            <input type="file"
                                                   class="form-control-file @error('slogan_image') is-invalid @enderror"
                                                   name="slogan_image" id="slogan_image"
                                                   aria-describedby="fileHelpId">
                                            @error('slogan_image')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group text-center col-6 m-auto">
                                            <img src="{{ asset($setting->slogan_image) }}"
                                                 style="max-width: 100%; max-height: 200px">
                                        </div>

                                        <div class="form-group">
                                            <label for="intro_content">محتوي intro</label>
                                            <textarea
                                                class="form-control @error('intro_content') is-invalid @enderror"
                                                name="intro_content" id="intro_content" rows="5"
                                                placeholder="اكتب المحتوي ..."
                                            >{{ $setting->intro_content }}</textarea>
                                            @error('intro_content')
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
                                            <img src="{{ asset($setting->intro_image) }}"
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
                                            <img src="{{ asset($setting->header_logo) }}"
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
                                            <img src="{{ asset($setting->footer_logo) }}"
                                                 style="max-width: 100%; max-height: 200px">
                                        </div>

                                        <div class="form-group">
                                            <label for="footer_image">صورة footer image</label>
                                            <input type="file"
                                                   class="form-control-file @error('footer_image') is-invalid @enderror"
                                                   name="footer_image" id="footer_image"
                                                   aria-describedby="fileHelpId">
                                            @error('footer_image')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group text-center col-6 m-auto">
                                            <img src="{{ asset($setting->footer_image) }}"
                                                 style="max-width: 100%; max-height: 200px">
                                        </div>

                                        <div class="form-group">
                                            <label for="facebook">لينك facebook</label>
                                            <input type="text" name="facebook" id="facebook"
                                                   class="form-control @error('facebook') is-invalid @enderror"
                                                   placeholder="اكتب لينك facebook"
                                                   aria-describedby="helpId" value="{{ $setting->facebook }}">

                                            @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="twitter">لينك twitter</label>
                                            <input type="text" name="twitter" id="twitter"
                                                   class="form-control @error('twitter') is-invalid @enderror"
                                                   placeholder="اكتب لينك twitter"
                                                   aria-describedby="helpId" value="{{ $setting->twitter }}">

                                            @error('twitter')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram">لينك instagram</label>
                                            <input type="text" name="instagram" id="instagram"
                                                   class="form-control @error('instagram') is-invalid @enderror"
                                                   placeholder="اكتب لينك instagram"
                                                   aria-describedby="helpId" value="{{ $setting->instagram }}">

                                            @error('instagram')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="linkedin">لينك linkedIn</label>
                                            <input type="text" name="linkedin" id="linkedin"
                                                   class="form-control @error('linkedin') is-invalid @enderror"
                                                   placeholder="اكتب لينك linkedin"
                                                   aria-describedby="helpId" value="{{ $setting->linkedin }}">

                                            @error('linkedin')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="whatsapp">لينك whatsApp</label>
                                            <input type="text" name="whatsapp" id="whatsapp"
                                                   class="form-control @error('whatsapp') is-invalid @enderror"
                                                   placeholder="اكتب لينك whatsapp"
                                                   aria-describedby="helpId" value="{{ $setting->whatsapp }}">

                                            @error('whatsapp')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-0 text-center mt-4">
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
