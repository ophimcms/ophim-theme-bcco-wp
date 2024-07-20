<div class="sidebar-widget-container border-container mb-5">
    <div class="title-wrapper">
        <h2 class="title"><i class="fa fa-star" style="color : #ffb137"></i> <?= $title; ?>
        </h2>
    </div>
    <div class="cscroller sidebar-widget-content scroll-y row">
        <?php $loop =0; while ($query->have_posts()) : $query->the_post(); $loop++; ?>
        <a href="<?php the_permalink(); ?>"
           title="<?php the_title(); ?> | <?= op_get_original_title() ?> (<?php the_title(); ?>)">
            <div class="watch-later-item">
                <div class="listing-container">
                    <div class="listing-image">
                        <div data-bg="url(<?= op_get_thumb_url() ?>)"
                             class="r43 rocket-lazyload"></div>
                    </div>
                    <div class="listing-content">
                        <div class="inner">
                            <h6 class="title"><?php the_title(); ?> </h6>
                            <p> <?= op_get_original_title() ?> (<?php the_title(); ?>)</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <?php endwhile; ?>
    </div>
</div>