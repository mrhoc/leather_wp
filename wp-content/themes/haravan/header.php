<?php
/**
 * The header for our theme
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="/" />
    <meta name="robots" content="index,follow,noodp">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Đồ da thủ công" />
    <meta property="og:image" content="" />
    <meta property="og:image" content="" />
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:alt" content="Đồ da thủ c&#244;ng" />
    <meta property="og:url" content="/" />
    <meta property="og:site_name" content="" />
    <style>
        :root {
            --bgshop: #5B3921;
            --colorshop: #5B3921;
            --colorshophover: #857469;
            --bgfooter: #5B3921;
            --colorfooter: #ffffff;
            --colorbgmenumb: #5B3921;
            --colortextmenumb: #BBA79C;
            --height-head: 62px;
            --imgselect: url(<?php echo get_template_directory_uri(); ?>/img/ico-select.svg?v=51);
            --bgsubcribe: url('<?php echo get_template_directory_uri(); ?>/img/modal-banner.jpg?v=51');
            --bg-filter: url('<?php echo get_template_directory_uri(); ?>/img/filter.svg?v=51');
            --bg-google: url('<?php echo get_template_directory_uri(); ?>/img/google-plus.png?v=51');
            --bg-facebook: url('<?php echo get_template_directory_uri(); ?>/img/facebook.png?v=51');

            --cancel: url(<?php echo get_template_directory_uri(); ?>/img/cancel-while.svg?v=51);
            --bg-footer: url(<?php echo get_template_directory_uri(); ?>/img/wd-footer-bg_bd337816b3d64003b9fa0ca6f4b8b3fa.png);
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=fallback"
            as="style" type="text/css" rel="preload stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/plugin-style.css?v=51" rel="preload stylesheet" as="style" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/styles-new.scss.css?v=51" rel="preload stylesheet" as="style" type="text/css">

    <link href="<?php echo get_template_directory_uri(); ?>/css/styles-index.scss.css?v=51" rel="preload stylesheet" as="style" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/js/slick/slick.css" rel="preload stylesheet" as="style" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/js/slick/slick-theme.css" rel="preload stylesheet" as="style" type="text/css">

    <?php wp_head(); ?>
</head>

<body id="wandave-theme" <?php body_class(); ?>>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0">
</script>
<header id="header" class="site-header">
    <div id="site-header-center">
        <div class="container">
            <div class="row-left-list d-flex d-flex-center">
                <div class=" hidden-lg hidden-md col-xs-3 col-sm-4 d-flex pd-right-0">
                    <button class="btn-menu-mb">
                        Menu <i class="fa-bars-menu" aria-hidden="true"></i><i class="fa-bars-menu"
                                                                               aria-hidden="true"></i><i class="fa-bars-menu" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="logo col-md-2 col-xs-6 col-sm-4 pd-right-0">
                    <a href="/">
                        <img class="dt-width-auto" height="30" width="185" src="<?php echo get_template_directory_uri(); ?>/img/logo1.png" LOGO LEATHER">
                    </a>
                </div>
                <nav class="col-md-8 hidden-xs hidden-sm pd-right-0">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'main-menu',
                        'container'      => false,
                        'items_wrap'     => '<ul id="menu-desktop" class="menu-desk">%3$s</ul>',
                        'walker'         => new Custom_Submenu_Walker(),
                        'fallback_cb'    => false
                    ]);
                    ?>
                </nav>

                <div class="col-md-2 group-icon-header col-xs-3 col-sm-4 pd-right-0 pd-0-mb">
                    <div class="cart-login-search align-items-center">
                        <ul class="list-inline list-unstyled mb-0">
                            <li class="list-inline-item mr-0">
                                <a href="/search" class="search js-search-desktop" data-original-title="Tìm kiếm"
                                   data-tooltip="tooltip">
                                    <img width="20" height="20" src="<?php echo get_template_directory_uri(); ?>/img/searcg-icon.svg?v=51" alt="Tìm kiếm">
                                </a>
                                <div class="header-action_dropdown">
                                        <span class="box-arrow">
                                            <svg viewBox="0 0 20 9" role="presentation">
                                                <path
                                                        d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                                        fill="#ffffff"></path>
                                            </svg>
                                        </span>
                                    <div class="header-dropdown_content">
                                        <p class="title-search">Tìm kiếm</p>
                                        <div class="site_search">
                                            <form action="/search" class="wanda-mxm-search">
                                                <div class="search-inner">
                                                    <input type="hidden" name="type" value="product">
                                                    <input name="q" autocomplete="off"
                                                           class="searchinput input-search search-input" type="text"
                                                           size="20" placeholder="Tìm kiếm sản phẩm..."
                                                           aria-label="Search">
                                                </div>
                                                <button type="submit" class="btn-search" id="search-header-btn"
                                                        aria-label="Tìm kiếm">
                                                    <img width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/searcg-icon.svg?v=51"
                                                         alt="Tìm kiếm">
                                                </button>
                                            </form>
                                            <div id="wanda-smart-search"
                                                 class="smart-search-wrapper ajaxSearchResults">
                                                <div class="results-seach">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav id="menu-mobile" class="hidden-md">

    <button id="wanda-close-handle" class="wanda-close-handle" aria-label="Đóng" title="Đóng">
        <span class="mb-menu-cls" aria-hidden="true"><span class="bar animate"></span></span>Đóng
    </button>
    <ul class="mb-menu"></ul>
</nav>
<div id="site-overlay" class="site-overlay active"></div>


