@extends("dashboard.layouts.dashboard")

@section('page_title', 'تفاصيل المشروع')

@section('style')
    <style>
        .show-article .project-show .special-heading h2 {
            margin-right: 15px;
        }
        .show-article .project-show .project-details {
            background: url({{asset('images/details-bg.png')}});
        }
        .show-article .project-show .project-slider .kbd {
            margin-top: 50px;
        }
        .show-article .project-show .project-slider .kbd kbd {
            cursor: pointer;
            margin-left: 5px;
        }

        .show-article .project-show .project-details h5 {
            color: #fff;
            line-height: 1.7;
        }

        .show-article .project-show .project-slider #carousel {
            height: 550px;
        }
        .show-article .project-show .project-slider #carousel img {
            height: 550px;
            width: 400px;
            cursor: pointer;
            top: 80px !important;

        }
        .show-article .project-show .project-slider #carousel .carousel-center {
            top: 0 !important;
        }
    </style>
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="show-article">
            <div class="container-fluid">
                <!-- Default box -->
                <div class="card main-content-card">
                    <div class="card-header">
                        <h3 class="card-title">تفاصيل المشروع</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="project-show">
                            <div class="special-heading">
                                <h2>تطبيق وان</h2>
                            </div>
                            <div class="project-header">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 col-md-9 col-lg-7">
                                        <img src="{{ asset('storage/' .$project->cover_image) }}" class="w-100">
                                    </div>
                                </div>
                            </div>

                            <div class="special-heading">
                                <h2>تفاصيل المشروع</h2>
                            </div>
                            <div class="project-details mt-5 py-5">
                                <div class="container-fluid">
                                    <h5 class="text-center">لوريم إيبسوم (Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</h5>
                                </div>
                            </div>

                            <div class="project-slider">
                                <div class="special-heading">
                                    <h2>خدلك لفه</h2>
                                </div>
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-sm-12 col-md-8 col-lg-12">
                                        <div class="kbd text-center">
                                            <kbd id="prev"><i class="fa fa-angle-right" aria-hidden="true"></i></kbd>
                                            <kbd id="next"><i class="fa fa-angle-left" aria-hidden="true"></i></kbd>
                                        </div>

                                        <div id="carousel">
                                            @foreach ($project->photos()->get('project_images') as $photo)
                                                <img src="{{ asset('storage/' .$photo->project_images) }}"/>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $(document).ready(function () {
            var carousel = $("#carousel").waterwheelCarousel({
                flankingItems: 1,
            });

            $('#prev').bind('click', function () {
                carousel.prev();
                return false
            });

            $('#next').bind('click', function () {
                carousel.next();
                return false;
            });
        });
    </script>
@stop
