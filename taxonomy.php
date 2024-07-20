<?php
get_header();
?>
<link href="<?= get_template_directory_uri() ?>/assets/css/catalog.css" rel="stylesheet">
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8" id="playlists">
                <form id="form-search" class="form-inline" method="GET" action="/">
                    <div class="filter-box mt-3">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <select class="form-control" id="type" name="filter[categories]" form="form-search">
                                    <option value="">Mọi định dạng</option>
                                    <?php $categories = get_terms(array('taxonomy' => 'ophim_categories', 'hide_empty' => false,));?>
                                    <?php foreach($categories as $category) { ?>
                                        <option value='<?php echo $category->name; ?>' ><?php echo $category->name ; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-3 col-6">
                                <select class="form-control" name="filter[regions]" form="form-search">
                                    <option value="">Tất cả quốc gia</option>
                                    <?php $regions = get_terms(array('taxonomy' => 'ophim_regions', 'hide_empty' => false,));?>
                                    <?php foreach($regions as $region) { ?>
                                        <option value='<?php echo $region->name; ?>' ><?php echo $region->name ; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-2 col-6">
                                <select class="form-control" id="category" name="filter[genres]" form="form-search">
                                    <option value="">Tất cả thể loại</option>
                                    <?php $genres = get_terms(array('taxonomy' => 'ophim_genres', 'hide_empty' => false,));?>
                                    <?php foreach($genres as $genre) { ?>
                                        <option value='<?php echo $genre->name; ?>' ><?php echo $genre->name ; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-2 col-6">
                                <select class="form-control" name="filter[years]" form="form-search">
                                    <option value="">Tất cả năm</option>
                                    <?php $years = get_terms(array('taxonomy' => 'ophim_years', 'hide_empty' => false,));?>
                                    <?php foreach($years as $year) { ?>
                                        <option value='<?php echo $year->name; ?>'><?php echo $year->name ; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-2 col-6">
                                <button type="submit" form="form-search" class="btn-submit btn-block">Lọc phim</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="playlist-wrapper playlist-list border-container mt-3 mb-5 p0">
                    <div class="row title-wrapper">
                        <div class="col-sm-12">
                            <h1 class="title"><?= single_tag_title(); ?></h1>
                        </div>
                    </div>
                    <div id="all-items" class="row">
                        <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                include THEMETEMPLADE.'/section/section_thumb_item.php';
                            } wp_reset_postdata(); }
                        else { ?>
                            <p>Rất tiếc, không có nội dung nào trùng khớp yêu cầu</p>
                        <?php } ?>
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
