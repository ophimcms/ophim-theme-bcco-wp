<?php

function add_theme_widgets() {
    $activate = array(
        'widget-footer' => array(
            'wg_footer-0',
        )
    );
    update_option('widget_wg_footer', array(
        0 => array('footer' => '<footer class="footer1 bg-dark">
                    <div class="footer-widget-area ptb100">
                    <div class="container">
                    <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-about">
                    <div class="logo2"><img width="128" height="33"
                    alt="OPHIMCMS | Xem Phim Thuyết Minh VietSub"
                    src="https://ophim.cc/logo-ophim-5.png"/></div>
                    <p class="nomargin">Tổng hợp phim mới, phim HOT vietsub, thuyết minh nhanh nhất. Xem phim
                    nhanh online miễn phí, chất lượng full HD.</p></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-links"><h4 class="widget-title">Phim Mới</h4>
                    <ul class="general-listing">
                    <li><a href="phim-le.html">Phim lẻ mới</a></li>
                    <li><a href="phim-bo.html">Phim bộ mới</a></li>
                    <li><a href="sap-chieu.html">Phim sắp chiếu</a></li>
                    </ul>
                    </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-links"><h4 class="widget-title">Phim Lẻ</h4>
                    <ul class="general-listing">
                    <li><a href="the-loai/hanh-dong.html">Phim hành động</a></li>
                    <li><a href="the-loai/co-trang.html">Phim kiếm hiệp-cổ trang</a></li>
                    <li><a href="the-loai/vien-tuong.html">Phim viễn tưởng</a></li>
                    </ul>
                    </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-links"><h4 class="widget-title">Tổng hợp phim hay</h4>
                    <ul class="general-listing">
                    <li><a href="quoc-gia/han-quoc.html">Phim Hàn Quốc</a></li>
                    <li><a href="quoc-gia/trung-quoc.html">Phim Trung Quốc</a></li>
                    <li><a href="quoc-gia/thai-lan.html">Phim Thái Lan</a></li>
                    </ul>
                    </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                    <ul class="general-listing">
                    <li><a target="_blank" rel="nofollow" href="/">TextLink</a></li>
                    <li><a target="_blank" rel="nofollow" href="/">TextLink</a></li>
                    </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                    <ul class="general-listing">
                    <li><a target="_blank" rel="nofollow" href="/">TextLink</a></li>
                    <li><a target="_blank" rel="nofollow" href="/">TextLink</a></li>
                    </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                    <ul class="general-listing">
                    <li><a target="_blank" rel="nofollow" href="/">TextLink</a></li>
                    <li><a target="_blank" rel="nofollow" href="/">TextLink</a></li>
                    </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                    <ul class="general-listing">
                    <li><a target="_blank" rel="nofollow" href="/">TextLink</a></li>
                    <li><a target="_blank" rel="nofollow" href="/">TextLink</a></li>
                    <li><a target="_blank" rel="nofollow" href="/">TextLink</a></li>
                    </ul>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="footer-copyright-area ptb30">
                    <div class="container">
                    <div class="row">
                    <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                    <div class="copyright">All Rights Reserved by <a href="#">OPHIMCMS</a>.</div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </footer>')
    ));
    update_option('sidebars_widgets',  $activate);

}

add_action('after_switch_theme', 'add_theme_widgets', 10, 2);