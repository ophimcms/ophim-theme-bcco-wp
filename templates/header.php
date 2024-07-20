<style>
    #result{
        margin-top: 20px;
        background-color: #333333;
        list-style-type: none;
        width: 600px;
        position: absolute;
        top: 32px;
        z-index: 100;
        padding-left: 0;
    }
    .column {
        float: left;
        padding: 5px;
    }

    .left {
        text-align: center;
        width: 20%;
    }

    .right {
        width: 80%;
    }
    .rowsearch:after {
        content: "";
        display: table;
        clear: both;
    }
    #result .rowsearch{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #result .rowsearch p{
        margin-bottom: 1px;
    }
    .rowsearch:hover {
        background-color: #2d2d2d;
    }
</style>
<header class="header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/">
                <?php op_the_logo('max-width:50px') ?>
            </a>
            <button id="mobile-nav-toggler" class="hamburger hamburger--collapse" type="button"><span
                        class="hamburger-box"><span class="hamburger-inner"></span></span></button>
            <div class="navbar-collapse justify-content-between" id="main-nav">
                <ul class="navbar-nav" id="main-menu">
                    <?php
                    $menu_items = wp_get_menu_array('primary-menu');
                    foreach ($menu_items as $key => $item) : ?>
                    <?php if (count($item['children'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" href="<?= $item['url'] ?>" title="<?= $item['title'] ?>"><?= $item['title'] ?></a>
                        <ul class="dropdown-menu col-2">
                            <?php foreach ($item['children'] as $k => $child): ?>
                            <li>
                                <a class="dropdown-item" href="<?= $child['url'] ?>" title="<?= $child['title'] ?>"><?= $child['title'] ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= $item['url'] ?>" title="<?= $item['title'] ?>"><?= $item['title'] ?></a>
                    </li>
                        <?php } ?>
                    <?php endforeach; ?>
                </ul>
                <ul class="navbar-nav extra-nav">
                    <li class="nav-item">
                        <form class="general-search" role="search" method="get" action="/" id="form-search">
                            <input type="text" placeholder="Tìm kiếm phim..." autocomplete="off" id="search" onkeyup="fetch()"
                                   name="s" class="search_input" value="<?php echo "$s"; ?>">
                            <span id="general-search-close" class="fa fa-search toggle-search" data-t="desktop"></span>
                        </form>
                        <div class="" id="result"></div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="mobile-search d-lg-none">
            <form class="general-search" role="search" method="get" action="/" id="form-search">
                <input type="text"
                       placeholder="Tìm kiếm phim..." name="s" class="search_input_2"
                       value="<?php echo "$s"; ?>">
                <span id="general-search-close" class="fa fa-search toggle-search"
                      data-t="mobile"></span>
            </form>
        </div>
    </div>
</header>
