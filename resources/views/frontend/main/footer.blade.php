<!-- Star Footer
    ============================================= -->
<footer class="bg-dark">
    <div class="container">
        <div class="footer-content default-padding">
            <div class="row">

                <div class="equal-height col-md-4 col-sm-6 item">
                    <div class="f-item about">
                        <h4 class="widget-title">About</h4>
                        <p>
                            {!! generalSettings()->website_description !!}
                        </p>
                        <ul>
                            @if(check_social_icon('Facebook'))
                            <li>
                                <a href="{{check_social_icon('Facebook')->URL}}"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('Instagram'))
                            <li>
                                <a href="{{check_social_icon('Instagram')->URL}}"><i class="fab fa-instagram"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('Twitter'))
                            <li>
                                <a href="{{check_social_icon('Twitter')->URL}}"><i class="fab fa-twitter"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('Google'))
                            <li>
                                <a href="{{check_social_icon('Google')->URL}}"><i class="fab fa-google"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('LinkedIn'))
                            <li>
                                <a href="{{check_social_icon('LinkedIn')->URL}}"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('Youtube'))
                            <li>
                                <a href="{{check_social_icon('Youtube')->URL}}"><i class="fab fa-youtube"></i></a>
                            </li>
                            @endif
                            @if(check_social_icon('Pinterest'))
                            <li>
                                <a href="{{check_social_icon('Pinterest')->URL}}"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="equal-height col-md-2 col-sm-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Usefull Links</h4>
                        <ul>
                            <li>
                                <a href="#">Classic Business</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li>
                                <a href="#">Gallery</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Services</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="equal-height col-md-2 col-sm-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Company</h4>
                        <ul>
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                            <li>
                                <a href="#">Gallery</a>
                            </li>
                            <li>
                                <a href="#">Faq</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="equal-height col-md-4 col-sm-6 item">
                    <div class="f-item contact address">
                        <h4 class="widget-title">Contact Us</h4>
                        <ul>
                            <li>
                                    <div class="icon"><i class="flaticon-location"></i></div>
                                    <span>@foreach (contact_all() as $item)
                                        {{$item->address_title}} <br>
                                        {{$item->address_details}}
                                        @endforeach</span>
                                </li>
                            <li>
                                <div class="icon">
                                    <i class="flaticon-call-center"></i>
                                </div>
                                <span>
                                    @foreach (contact_all() as $item)
                                        {{ $item->phone }}
                                        <br>
                                    @endforeach
                                </span>

                            </li>
                            <li>
                                <div class="icon">
                                    <i class="flaticon-email"></i>
                                </div>
                                <span>
                                    @foreach (contact_all() as $item)
                                        {{ $item->email }} <br>
                                    @endforeach
                                </span>

                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer Bottom -->
    <div class="footer-bottom text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Copyright &copy; {{generalSettings()->copyright_text}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!-- End Footer-->
