<link href="<?= get_template_directory_uri() ?>/assets/css/episode.css" rel="stylesheet">
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8" id="playlists">
                <div class="block mt-3 mb-3" itemscope itemtype="http://schema.org/Movie">
                    <div class="block-body">
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
                        <div class="watch-block">
                            <div id="main-player">
                                <div class="loadingData"><span class="mess">Đang tải phim...</span></div>
                                <div id="playerLoaded"></div>
                            </div>
                            <div id="ploption" class="block-wrapper text-center">
                                <a data-id="<?= episodeName() ?>" data-link="<?= m3u8EpisodeUrl() ?>" data-type="m3u8"
                                   onclick="chooseStreamingServer(this)"
                                   class="streaming-server btn-sv btn-hls btn btn-primary">VIP #1</a>
                                <a data-id="<?= episodeName() ?>" data-link="<?= embedEpisodeUrl() ?>" data-type="embed"
                                   onclick="chooseStreamingServer(this)"
                                   class="streaming-server btn-sv btn-hls btn btn-primary">VIP #2</a>
                            </div>

                            <div class="rating-block">
                                <div class="box-rating" itemprop="aggregateRating" itemscope
                                     itemtype="https://schema.org/AggregateRating">
                                    <div id="star" data-score="<?= op_get_rating() ?>" style="cursor: pointer;">
                                    </div>
                                    <div>
                                        <div id="div_average" style="line-height: 16px; margin: 0 5px; ">
                                            <span id="hint"></span> ( <span class="average" id="average" itemprop="ratingValue">
                                    <?= op_get_rating() ?></span>&nbsp;điểm
                                            /&nbsp; <span id="rate_count"
                                                          itemprop="ratingCount"><?= op_get_rating_count() ?></span>
                                            &nbsp;lượt)
                                        </div>
                                        <meta itemprop="bestRating" content="10" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="epi-list-all mb-3">
                           <?php foreach (episodeList() as $key => $server) { ?>
                            <div class="epi-block">
                                <div class="epi-block-left">
                                    <i class="fa fa-film"></i><?= $server['server_name'] ?>:
                                </div>
                                <div class="epi-block-right">
                                    <div class="movie-eps-wrapper cscroller">
                                        <?php foreach ($server['server_data'] as $list) {
                                            $current = '';
                                            if (slugify($list['name']) == episodeName()&& episodeSV() == $key) {
                                                $current = 'btn-active';
                                            }
                                            echo '
                                           <a class="movie-eps-item ' . $current . '" href="' . hrefEpisode($list["name"],$key) . '">
                                                ' . $list['name'] . '
                                            </a> 
                                        ';
                                        } ?>
                                    </div>
                                </div>
                            </div>
                           <?php } ?>
                        </div>

                        <div class="row">
                            <div class="col-md-2 d-none d-sm-block pr-0">
                                <img class="movie-thumb img"
                                     alt="<?php the_title(); ?> | <?= op_get_original_title() ?> (<?= op_get_year() ?>)"
                                     src="<?= op_get_thumb_url() ?>" itemprop="image">
                            </div>
                            <div class="col-md-10 col-12">
                                <div class="head">
                                    <div class="c1">
                                        <h1 class="title" itemprop="name"><?php the_title(); ?> Tập <?= episodeName() ?></h1>
                                        <h2> <?= op_get_original_title() ?> (<?= op_get_year() ?>)</h2>
                                    </div>
                                    <div class="meta-info">
                                        <p><?php the_content();?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="film-info-block mt-3">
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
                            <div style="color:red;font-weight:bold;padding:5px">Lưu ý các bạn không nên nhấp vào các
                                đường link ở phần bình luận, kẻ gian có thể đưa virut vào thiết bị hoặc hack mất
                                facebook của các bạn.
                            </div>
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
add_action('wp_footer', function () {?>
    <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-core.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-hlsjs.min.js"></script>
    <?php op_jwpayer_js(); ?>

    <script>
        var episode_id = '<?= episodeName() ?>';
        const wrapper = document.getElementById('playerLoaded');
        const vastAds = "<?= get_option('ophim_jwplayer_advertising_file') ?>";

        function chooseStreamingServer(el) {
            const type = el.dataset.type;
            const link = el.dataset.link.replace(/^http:\/\//i, 'https://');
            const id = el.dataset.id;

            episode_id = id;


            Array.from(document.getElementsByClassName('streaming-server')).forEach(server => {
                server.classList.remove('active');
            })
            el.classList.add('active');

            renderPlayer(type, link, id);
        }

        function renderPlayer(type, link, id) {
            $('.loadingData').hide();
            if (type == 'embed') {
                if (vastAds) {
                    wrapper.innerHTML = `<div id="fake_jwplayer"></div>`;
                    const fake_player = jwplayer("fake_jwplayer");
                    const objSetupFake = {
                        key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                        aspectratio: "16:9",
                        width: "100%",
                        file: "<?= get_template_directory_uri() ?>/assets/player/1s_blank.mp4",
                        volume: 100,
                        mute: false,
                        autostart: true,
                        advertising: {
                            tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                            client: "vast",
                            vpaidmode: "insecure",
                            skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                            skipmessage: "Bỏ qua sau xx giây",
                            skiptext: "Bỏ qua"
                        }
                    };
                    fake_player.setup(objSetupFake);
                    fake_player.on('complete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adSkipped', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adComplete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });
                } else {
                    if (wrapper) {
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    }
                }
                return;
            }

            if (type == 'm3u8' || type == 'mp4') {
                wrapper.innerHTML = `<div id="jwplayer"></div>`;
                const player = jwplayer("jwplayer");
                const objSetup = {
                    key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                    aspectratio: "16:9",
                    width: "100%",
                    image: "<?= op_get_poster_url() ?>",
                    file: link,
                    playbackRateControls: true,
                    playbackRates: [0.25, 0.75, 1, 1.25],
                    sharing: {
                        sites: [
                            "reddit",
                            "facebook",
                            "twitter",
                            "googleplus",
                            "email",
                            "linkedin",
                        ],
                    },
                    volume: 100,
                    mute: false,
                    autostart: true,
                    logo: {
                        file: "<?= get_option('ophim_jwplayer_logo_file') ?>",
                        link: "<?= get_option('ophim_jwplayer_logo_link') ?>",
                        position: "<?= get_option('ophim_jwplayer_logo_position') ?>",
                    },
                    advertising: {
                        tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                        client: "vast",
                        vpaidmode: "insecure",
                        skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                        skipmessage: "Bỏ qua sau xx giây",
                        skiptext: "Bỏ qua"
                    }
                };

                if (type == 'm3u8') {
                    const segments_in_queue = 50;

                    var engine_config = {
                        debug: !1,
                        segments: {
                            forwardSegmentCount: 50,
                        },
                        loader: {
                            cachedSegmentExpiration: 864e5,
                            cachedSegmentsCount: 1e3,
                            requiredSegmentsPriority: segments_in_queue,
                            httpDownloadMaxPriority: 9,
                            httpDownloadProbability: 0.06,
                            httpDownloadProbabilityInterval: 1e3,
                            httpDownloadProbabilitySkipIfNoPeers: !0,
                            p2pDownloadMaxPriority: 50,
                            httpFailedSegmentTimeout: 500,
                            simultaneousP2PDownloads: 20,
                            simultaneousHttpDownloads: 2,
                            // httpDownloadInitialTimeout: 12e4,
                            // httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpDownloadInitialTimeout: 0,
                            httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpUseRanges: !0,
                            maxBufferLength: 300,
                            // useP2P: false,
                        },
                    };
                    if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
                        var engine = new p2pml.hlsjs.Engine(engine_config);
                        player.setup(objSetup);
                        jwplayer_hls_provider.attach();
                        p2pml.hlsjs.initJwPlayer(player, {
                            liveSyncDurationCount: segments_in_queue, // To have at least 7 segments in queue
                            maxBufferLength: 300,
                            loader: engine.createLoaderClass(),
                        });
                    } else {
                        player.setup(objSetup);
                    }
                } else {
                    player.setup(objSetup);
                }


                const resumeData = 'OPCMS-PlayerPosition-' + id;
                player.on('ready', function() {
                    if (typeof(Storage) !== 'undefined') {
                        if (localStorage[resumeData] == '' || localStorage[resumeData] == 'undefined') {
                            console.log("No cookie for position found");
                            var currentPosition = 0;
                        } else {
                            if (localStorage[resumeData] == "null") {
                                localStorage[resumeData] = 0;
                            } else {
                                var currentPosition = localStorage[resumeData];
                            }
                            console.log("Position cookie found: " + localStorage[resumeData]);
                        }
                        player.once('play', function() {
                            console.log('Checking position cookie!');
                            console.log(Math.abs(player.getDuration() - currentPosition));
                            if (currentPosition > 180 && Math.abs(player.getDuration() - currentPosition) >
                                5) {
                                player.seek(currentPosition);
                            }
                        });
                        window.onunload = function() {
                            localStorage[resumeData] = player.getPosition();
                        }
                    } else {
                        console.log('Your browser is too old!');
                    }
                });

                player.on('complete', function() {
                    <?php if(nextEpisodeUrl()){ ?>
                    window.location.href = "<?= nextEpisodeUrl() ?>";
                    <?php }?>
                    if (typeof(Storage) !== 'undefined') {
                        localStorage.removeItem(resumeData);
                    } else {
                        console.log('Your browser is too old!');
                    }
                })

                function formatSeconds(seconds) {
                    var date = new Date(1970, 0, 1);
                    date.setSeconds(seconds);
                    return date.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
                }
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const episode = '<?= episodeName() ?>';
            let playing = document.querySelector(`[data-id="${episode}"]`);
            if (playing) {
                playing.click();
                return;
            }

            const servers = document.getElementsByClassName('streaming-server');
            if (servers[0]) {
                servers[0].click();
            }
        });
    </script>

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