<nav class="navbar navbar-light">
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('front.home') }}">
            <img src="{{ asset($setting->header_logo) }}" width="230" height="80" class="d-inline-block align-top"
                 alt="">
        </a>
    </nav>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01"
            aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('front.home') }}">الرئيسيه <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('front.projects.index') }}">اعمالنا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('front.articles.index') }}">المقالات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
            </li>
        </ul>
    </div>
</nav>
