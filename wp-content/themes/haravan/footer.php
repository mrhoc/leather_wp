<?php
/**
 * The template for displaying the footer
 */
?>
<footer class="mg-top-30 mg-0 pd-bt-50-mb bgft">
    <div class="top-ft-wanda">
        <div class="container">
            <div class="d-flex row">
                <div class="col-md-3 col-sm-6 col-xs-12 infomation mg-bottom-15">
                    <div class="title-footer">
                        <h4 class="h4">
                            Corp LEATHER
                        </h4>
                    </div>
                    <div class="infomation-wanda">
                        <p>

                        </p>
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> Đống Đa,
                                Hà Nội</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i> <a rel="nofollow"
                                                                                  href="tel:666666666 - 888888888">666666666 - 888888888</a></li>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a rel="nofollow"
                                                                                       href="mailto:test@gmail.com">test@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6 tablink mg-bottom-15">
                    <div class="title-footer">
                        <h4 class="h4">
                            Liên kết
                        </h4>
                    </div>
                    <div class="footer-link-wanda">
                        <ul>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 tablink mg-bottom-15">
                    <div class="title-footer">
                        <h4 class="h4">
                            Fanpage
                        </h4>
                    </div>

                    <div class="footer-fanpage-wanda">
                        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-width="380"
                             data-hide-cover="false" data-show-facepile="false"></div>
                    </div>


                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 newletter">
                    <div class="title-footer">
                        <h4 class="h4">
                            Đăng ký nhận khuyến mãi
                        </h4>
                        <p>
                            Hãy là người đầu tiên nhận khuyến mãi lớn!
                        </p>
                    </div>
                    <div class="form-ft-wanda">
                        <?php echo do_shortcode('[custom_email_form]');
                        ?>

                    </div>
                    <ul class="social-footer d-flex mg-top-10 d-flex-center">
                        <li class="tiktok"><a href="https://www.tiktok.com/r"><img width="18" height="18"
                                                                                   src="<?php echo get_template_directory_uri(); ?>/img/tik-tok.svg?v=51" alt="Liên hệ với chúng tôi qua Tiktok"></a></li>
                        <li class="instagram"><a href="https://www.facebook.com/"><i class="fa fa-instagram"
                                                                                     aria-hidden="true"></i></a></li>
                        <li class="facebook"><a href="https://www.instagram.com//"><i class="fa fa-facebook"
                                                                                      aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wanda">
        <div class="container">
            <div class="row d-flex d-flex-center js-center">
                <div class="col-md-8 text-md-right text-left order-mb-2">
                    <div class="text-copyright mb-0">
                        <p>© Copyright 2025 By <a href="/" rel="nofollow" target="_blank"
                                                  class="underline_hover link"> Corp LEATHER.</a></p>
                    </div>
                </div>
                <div class="col-md-4 text-center mg-bt-mb-10 order-mb-1">
                    <img class="lazyload" src="<?php echo get_template_directory_uri(); ?>/img/loading-black-small.svg?v=51"
                         data-src="<?php echo get_template_directory_uri(); ?>/img/pay_copyright.png?v=51" width="247" height="25" alt="Payment">
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="social-fixed">
    <ul>
        <li class="hotline"><a href="tel:" data-toggle="tooltip" data-original-title="Liên hệ "><i
                        class="fa fa-phone"></i></a></li>
        <li class="zalo"><a href="https://zalo.me/" data-toggle="tooltip"
                            data-original-title="Liên hệ với chúng tôi qua Zalo"><img width="45" height="45"
                                                                                      src="<?php echo get_template_directory_uri(); ?>/img/zalo-icon.svg?v=51" alt="Liên hệ với chúng tôi qua Zalo"></a></li>
        <li class="tiktok"><a href="https://www.tiktok.com/" data-toggle="tooltip"
                              data-original-title="Liên hệ với chúng tôi qua Tiktok"><img width="25" height="25"
                                                                                          src="<?php echo get_template_directory_uri(); ?>/img/tik-tok.svg?v=51" alt="Liên hệ với chúng tôi qua Tiktok"></a></li>
        <li class="instagram"><a href="https://www.instagram.com/" data-toggle="tooltip"
                                 data-original-title="Liên hệ với chúng tôi qua Instagram"><i class="fa fa-instagram"
                                                                                              aria-hidden="true"></i></a></li>
    </ul>
    <div class="btn-support"></div>
</div>
<button class="back-to-top"><i class="fa fa-angle-double-up"></i> back to top</button>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custome-js.js"></script>


<?php wp_footer(); ?>

</body>
</html>
