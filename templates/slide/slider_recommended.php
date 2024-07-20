<div class="container">
    <div class="playlist-wrapper mt-3 mb-5">
        <div class="row title-wrapper">
            <div class="col-sm-8"><h2 class="title"><?= $title ?></h2></div>
            <div class="col-sm-4 align-self-center text-right">
                <a href="<?= $slug ?>" class="btn btn-icon btn-playlist btn-effect" title="<?= $title ?>"> Xem tất cả <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
        <div class="pl-carousel-wrapper">
            <div class="pl-carousel">
                <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
                    <div class="pl-carousel-cell">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> | <?= op_get_original_title() ?> (<?= op_get_year() ?>)">
                            <div class="movie-box-1 movie-box-2">
                                <div data-bg="url(<?= op_get_thumb_url() ?>)" class="poster r43 rocket-lazyload">
                                </div>
                                <div class="movie-details text-left pl-2 pr-2">
                                    <h6 class="movie-title"><?php the_title(); ?> </h6>
                                    <span class="released"> <?= op_get_original_title() ?> (<?= op_get_year() ?>)</span>
                                </div>
                                <div class="ribbon"><?= op_get_episode() ?> <?= op_get_lang() ?></div>
                            </div>
                        </a>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
