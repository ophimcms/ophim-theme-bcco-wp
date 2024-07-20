<div class="playlist-wrapper playlist-list border-container mt-3 mb-5">
    <div class="row title-wrapper">
        <div class="col-sm-8">
            <h2 class="title"><?= $title; ?></h2>
        </div>
        <div class="col-sm-4 align-self-center text-right">
            <a href="<?= $slug; ?>" class="btn btn-icon btn-playlist btn-effect"
               title="<?= $title; ?>"> Xem tất cả
                <i class="fa fa-chevron-right"></i>
            </a>
        </div>
    </div>
    <div class="row" style="margin: 0 -0.25rem;">
        <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++;
            include THEMETEMPLADE.'/section/section_thumb_item.php';
        endwhile; ?>
    </div>
</div>