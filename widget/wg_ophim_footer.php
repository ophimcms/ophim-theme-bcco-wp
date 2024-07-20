<?php
class WG_oPhim_Footer extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'wg_footer', // Base ID
            __( 'Ophim Footer', 'ophim' ), // Name
            array( 'description' => __( 'Mẫu footer', 'ophim' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract($args);
        ob_start();
        echo $instance['footer'] ?? '';
        echo $after_widget;
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title' 	=> '',
            'slug' 	=> '#',
            'postnum' 	=> 5,
            'style'		=> '1',
            'status'		=> 'all',
            'orderby'		=> 'new',
            'categories'		=> 'all',
            'actors'		=> 'all',
            'directors'		=> 'all',
            'genres'		=> 'all',
            'regions'		=> 'all',
            'years'		=> 'all',
        ) );
        extract($instance);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('footer'); ?>"><?php _e('Footer', 'ophim') ?></label>
            <br />
            <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('footer'); ?>" name="<?php echo $this->get_field_name('footer'); ?>"  ><?php if(isset($instance['footer']) && $instance['footer']){ echo $instance['footer'];}else{ ?> <footer class="footer1 bg-dark">
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
                    </footer><?php } ?></textarea>
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['footer'] = $new_instance['footer'];
        return $instance;
    }

}
function register_new_widget_Footer() {
    register_widget( 'WG_oPhim_Footer' );
}
add_action( 'widgets_init', 'register_new_widget_Footer' );
