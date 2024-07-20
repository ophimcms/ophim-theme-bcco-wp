<?php
get_header();
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8" id="playlists">
                <?php
                while ( have_posts() ) : the_post();
                    ?>
                    <div class="group-film">
                        <h1><?php the_title(); ?></h1>
                        <div class="content">
                            <?php  the_content(); ?>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
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
