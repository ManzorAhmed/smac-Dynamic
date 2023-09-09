<!-- Hero Section Begin -->
@php
    $logo_img = get_attachment_image_by_id(get_static_option('footer_background_image'), null, true);
@endphp
<div class="footer-top"
     @if (!empty($logo_img))
     data-setbg="{{ $logo_img['img_url'] }}"
     @else
     data-setbg="{{asset('frontend/img/hero.jpg')}}"
    @endif
>
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>smac</h3>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            Syscoms College Building, Opp. Abu Dhabi Chamber of Commerce, 4th Floor 402 - Abu Dhabi<br>
                            <strong>Phone:</strong> 02 622 7887<br>
                            <strong>Email:</strong> info@smacuae.com<br>
                        </p>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>For Information About Medical Equipment</h4>
                        <p><strong>Email:</strong><a href="mailto:Waleed@smacuae.com" style="text-decoration: underline;color: white"> Waleed@smacuae.com</a></p>
                        <p><strong>Contact No:
                                :</strong><a href="tel: +971 2 622 7887" style="text-decoration: underline;color: white"> +971 2 622 7887</a></p>

                        {{--                        <form action="" method="post">--}}
{{--                            <input type="email" name="email"><input type="submit" value="Subscribe">--}}
{{--                        </form>--}}
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Smacuae</strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
