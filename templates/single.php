<link href="<?= get_template_directory_uri() ?>/assets/css/single.css" rel="stylesheet">
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8" id="playlists">
                <div class="block mt-3 mb-3">
                    <div class="block-body" itemscope itemtype="http://schema.org/Movie">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="movie-thumb position-relative">
                                    <img class="img img-fluid"
                                         alt="<?php the_title(); ?> | <?= op_get_original_title() ?> (<?= op_get_year() ?>)"
                                         src="<?= op_get_thumb_url() ?>" itemprop="image">

                                    <?php if (watchUrl()) { ?>
                                    <a href="<?= watchUrl() ?>" class="btn btn-danger btn-block mt-2">Xem Phim</a>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="head">
                                    <div class="c1">
                                        <h1 class="title" itemprop="name"><?php the_title(); ?> </h1>
                                        <h2> <?= op_get_original_title() ?> (<?= op_get_year() ?>)</h2>
                                    </div>
                                    <div class="meta-info">
                                        <ul>
                                            <li>
                                                <span>Thể loại: </span>
                                                <?= op_get_genres(', ') ?>
                                            </li>
                                            <li>
                                                <span>Quốc gia: </span>
                                                <?= op_get_regions(', ') ?>
                                            </li>
                                            <li>
                                                <span>Trạng thái: </span>
                                                <span itemprop="duration"><?= op_get_status() ?></span>
                                            </li>
                                            <li>
                                                <span>Đạo diễn: </span>
                                                <?= op_get_directors(10,', ') ?>
                                            </li>
                                            <li>
                                                <span>Diễn viên: </span>
                                                <?= op_get_actors(10,', ') ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rating-block">
                                        <div class="box-rating" itemprop="aggregateRating" itemscope
                                             itemtype="https://schema.org/AggregateRating">
                                            <div id="star" data-score="<?= op_get_rating() ?>"
                                                 style="cursor: pointer;"></div>
                                            <div>
                                                <div id="div_average" style="line-height: 16px; margin: 0 5px; ">
                                                    <span id="hint"></span> ( <span class="average" id="average"
                                                                                    itemprop="ratingValue">
                                            <?= op_get_rating() ?></span>&nbsp;điểm
                                                    /&nbsp; <span id="rate_count"
                                                                  itemprop="ratingCount"><?= op_get_rating_count() ?></span>
                                                    &nbsp;lượt)
                                                </div>
                                                <meta itemprop="bestRating" content="10" />
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (op_get_notify()) { ?>
                                    <div class="alert alert-info fade show" role="alert">
                                        Thông báo: <span class="text-danger"><?= op_get_notify() ?></span>
                                    </div>
                                    <?php } ?>
                                    <?php if (op_get_showtime_movies()) { ?>
                                    <div class="alert alert-primary fade show" role="alert">
                                        Lịch chiếu: <span class="text-info"><?= op_get_showtime_movies() ?></span>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="film-info-block mt-3">
                            <div class="title-hd">
                                <h2>Nội dung phim</h2>
                            </div>
                            <div class="film-info" itemprop="description">
                                <h3><?php the_title(); ?>, <?= op_get_original_title() ?> (<?= op_get_year() ?>)
                                </h3>
                                <p><?php the_content();?></p>
                            </div>
                            <div class="movie-detail-h3">Từ khóa:</div>
                            <div class="tag-list">
                                <h3>
                                    <strong>
                                        <?= op_get_tags(' | ') ?>
                                    </strong>
                                </h3>
                            </div>
                        </div>
                        <div class="block-comment mt-3">
                            <div class="title-hd">
                                <h2>Bình luận</h2>
                            </div>
                            <div style="color:red;font-weight:bold;padding:5px">Lưu ý các bạn không nên nhấp vào các đường link ở phần
                                bình luận, kẻ gian có thể đưa virut vào thiết bị hoặc hack mất facebook của các bạn. </div>
                            <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                 data-numposts="5" data-colorscheme="light" data-lazy="true">
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
add_action('wp_footer', function (){?>
    <link href="<?= get_template_directory_uri() ?>/assets/libs/raty/jquery.raty.css" rel="stylesheet" />
    <script src="<?= get_template_directory_uri() ?>/assets/libs/raty/jquery.raty.js"></script>
    <script>
        var rated = false;
        $('#star').raty({
            number: 10,
            starHalf: '<?= get_template_directory_uri() ?>/assets/libs/raty/images/star-half.png',
            starOff: '<?= get_template_directory_uri() ?>/assets/libs/raty/images/star-off.png',
            starOn: '<?= get_template_directory_uri() ?>/assets/libs/raty/images/star-on.png',
            click: function(score, evt) {
                if (!rated) {
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php')?>',
                        type: 'POST',
                        data: {
                            action: "ratemovie",
                            rating: score,
                            postid: '<?php echo get_the_ID(); ?>',
                        },
                    }).done(function (res) {
                        $('#average').html(res.rating_star);
                        $('#rate_count').html(res.rating_count);
                        $('#star').attr('data-score', res.rating_star);
                        rated = true;
                    });
                }
            }
        });
    </script>


<?php }) ?>