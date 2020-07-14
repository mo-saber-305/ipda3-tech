<nav class="navbar navbar-light">
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('front.home') }}">
            <img src="{{ asset('storage/' . $setting->header_logo) }}" width="230" height="80" class="d-inline-block align-top" alt="">
        </a>
    </nav>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">الرئيسيه <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-value="about-us">عن ابداع تك</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-value="our-works">خدماتنا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-value="some-works">اعمالنا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-value="news">المقالات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-value="clients">عملائنا</a>
            </li>
        </ul>
    </div>
</nav>
