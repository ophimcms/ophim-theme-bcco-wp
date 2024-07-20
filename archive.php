<?php
get_header();
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8" id="playlists">
                <div class="playlist-wrapper playlist-list border-container mt-3 mb-5 p0">
                    <div class="row title-wrapper">
                        <div class="col-sm-12">
                            <h1 class="title"><?= single_tag_title(); ?></h1>
                        </div>
                    </div>
                    <div id="all-items" class="row" style="padding: 20px">
                        <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post(); ?>
                                <div class="row" style="margin-bottom: 20px">
                                    <div class="col-md-12 blogShort">

                                        <a href="<?php the_permalink(); ?>"><img style="width: 150px;margin-right: 15px" src="<?= op_remove_domain(get_the_post_thumbnail_url()) ?>"
                                                                                 alt="<?php the_title(); ?>" class="pull-left img-responsive thumb margin10 img-thumbnail"></a>
                                        <br>
                                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                        <article>
                                            <p>
                                                <?php the_excerpt(); ?>
                                            </p></article>
                                        <a class="btn btn-blog pull-right marginBottom10" href="<?php the_permalink(); ?>">Xem thêm</a>
                                    </div>

                                </div>
                            <?php }
                            wp_reset_postdata();
                        } ?>
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <?php ophim_pagination(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <?php get_sidebar('ophim'); ?>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>
