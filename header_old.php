<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */
global $pagesData;
global $currentLangData;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title><?php the_title(); ?> | <?= get_bloginfo('name'); ?></title>
<link rel="shortcut icon" type="image/png" href="<?= bloginfo('template_url'); ?>/assets/images/favicon.png"/>
<meta name="theme-color" content="#0b0e18"/>
<meta property="og:image" content="<?= bloginfo('template_url'); ?>/assets/images/sm.png" />
<meta property="og:image:width" content="800" />
<meta property="og:image:height" content="600" />
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="header <?= (get_post_type() == 'mieszkania')? 'forcefixed' : ''; ?>">
        <div class="container">
            <div class="row header--height justify-content-between align-items-center">
                <div class="col-auto">
                    <div class="logo logo-js">
                        <a href="<?php echo bloginfo('url'); ?>">
                            <img class="style-svg" src="<?php echo bloginfo('template_url'); ?>/assets/images/logo.svg" alt="Exnovo">
                        </a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="menu menu-js">
                        <div class="menu--scroll">
                            <div class="menu__nav">
                                <nav>
                                    <?php wp_nav_menu(['menu' => 'menu_pl', 'container' => '', 'menu_class' => '']); ?>
                                    <ul>
                                        <li><a href="tel:<?= get_field('header_phone', $pagesData['home']); ?>"><?= get_field('header_phone', $pagesData['home']); ?></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="button">
                        <div class="hamburger hamburger--squeeze hamburger-js">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
