<!--Start Footer-->

<footer>
    <div class="container">
        <div class="row align-items-center content">
            <div class="col-md-6 side-1">
                <img src="{{ asset('images/footer-vec.jpg') }}" width="200" height="300">
            </div>
            <div class="col-md-6 side-2">
                <img src="{{ asset('storage/' . $setting->footer_logo) }}" width="250" height="65">
                <h5>المنصورة-حي الجامعة-تقسيم الزعفران</h5>
                <div class="icons">
                    <ul>
                        <li>
                            <a href="{{  $setting->whatsapp }}" target="_blank" class="hvr-icon-spin">
                                <i class="fab fa-whatsapp hvr-icon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{  $setting->twitter }}" target="_blank" class="hvr-icon-spin">
                                <i class="fab fa-twitter hvr-icon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{  $setting->facebook }}" target="_blank" class="hvr-icon-spin">
                                <i class="fab fa-facebook hvr-icon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{  $setting->instagram }}" target="_blank" class="hvr-icon-spin">
                                <i class="fab fa-instagram hvr-icon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{  $setting->linkedin }}" target="_blank" class="hvr-icon-spin">
                                <i class="fab fa-linkedin hvr-icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>

<!--End Footer-->
