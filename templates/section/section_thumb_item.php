<div class="col-lg-3 col-md-4 col-6 pr-1 pl-1">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> | <?= op_get_original_title() ?> (<?= op_get_year() ?>)">
        <div class="movie-box-2 mb-1">
            <div class="listing-container">
                <div class="listing-image">
                    <div data-bg="url(<?= op_get_thumb_url() ?>)" class="r43 rocket-lazyload">
                    </div>
                </div>
                <div class="listing-content text-left">
                    <h6 class="title elipsis"><?php the_title(); ?> </h6>
                    <p class="elipsis"> <?= op_get_original_title() ?> (<?= op_get_year() ?>)</p>
                </div>
            </div>
            <div class="ribbon"><?= op_get_episode() ?> <?= op_get_quality() ?></div>
        </div>
    </a>
</div>
