<?php
get_header();
?>
<main><?php if ( is_active_sidebar('widget-slider-poster') ) {
        dynamic_sidebar( 'widget-slider-poster' );
    } else {
        _e('This is widget poster. Go to Appearance -> Widgets to add some widgets.', 'ophim');
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8" id="playlists">
                <div class="playlist-container">
                <?php if ( is_active_sidebar('widget-area') ) {
                    dynamic_sidebar( 'widget-area' );
                } else {
                    _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
                }
                ?>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <?php get_sidebar('ophim'); ?>
            </div>
        </div>
    </div>
</main>

<?php
add_action('wp_footer', function (){?>

    <script>
        $(function() {
            var banner = $(".bn-carousel").flickity({
                contain: true,
                prevNextButtons: false,
                pageDots: false,
                groupCells: true,
                autoPlay: 3500,
                wrapAround: true,
                bgLazyLoad: 1
            });
            var flkty = banner.data('flickity');
            var $imgs = banner.find(".bn-carousel-img");
            banner.on('scroll.flickity', function(event, progress) {
                flkty.slides.forEach(function(slide, i) {
                    var img = $imgs[i];
                    var x = (slide.target + flkty.x) * -1 / 3;
                    img.style.transform = 'translateX( ' + x + 'px)';
                });
            });
        });
    </script>

<?php }) ?>
<?php
get_footer();
?>
