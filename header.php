<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */
global $pagesData;
global $currentLangData;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title><?php the_title(); ?> | <?= get_bloginfo('name'); ?></title>
  <link rel="shortcut icon" type="image/png" href="<?= bloginfo('template_url'); ?>/assets/images/favicon.png" />
  <!-- <meta name="theme-color" content="#0b0e18"/> -->
  <meta property="og:image" content="<?= bloginfo('template_url'); ?>/assets/images/sm.png" />
  <meta property="og:image:width" content="800" />
  <meta property="og:image:height" content="600" />
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> -->

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

  <?php wp_head(); ?>
</head>

<body>
  <header class="header">
    <h1 data-aos="fade-down" class="logo">
      <a href="<?php echo bloginfo('url'); ?>" class="header-link"><img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/logo.svg" alt="Exnovo" /></a>
    </h1>
    <nav class="nav">
      <ul class="nav-list">
        <li class="nav-list--item expandable">
          <a href="" class="nav-list--item-link-expandable">Nieruchomości<img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/menu-item-expander.png" alt="" /></a>
          <ul class="nav-list--secondary">
            <li class="nav-list--item secondary">
              <a href="<?php echo bloginfo('url'); ?>/rynek-pierwotny" class="nav-list--item-link">Rynek pierwotny</a>
            </li>
            <li class="nav-list--item secondary">
              <a href="<?php echo bloginfo('url'); ?>/oferty" class="nav-list--item-link">Rynek wtórny</a>
            </li>
          </ul>
        </li>
        <li class="nav-list--item expandable">
          <a href="" class="nav-list--item-link-expandable">Kredyty<img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/menu-item-expander.png" alt="" /></a>
          <ul class="nav-list--secondary">
            <li class="nav-list--item secondary">
              <a href="<?php echo bloginfo('url'); ?>/finansowanie" class="nav-list--item-link">Kredyty hipoteczne</a>
            </li>
            <li class="nav-list--item secondary">
              <a href="<?php echo bloginfo('url'); ?>/finansowanie" class="nav-list--item-link">Kredyty gotówkowe</a>
            </li>
            <li class="nav-list--item secondary">
              <a href="<?php echo bloginfo('url'); ?>/finansowanie" class="nav-list--item-link">Kredyty firmowe</a>
            </li>
          </ul>
        </li>
        <li class="nav-list--item"><a href="<?php echo bloginfo('url'); ?>/uslugi" class="nav-list--item-link">Usługi</a></li>
        <li class="nav-list--item"><a href="<?php echo bloginfo('url'); ?>/o-nas" class="nav-list--item-link">O nas</a></li>
        <li class="nav-list--item"><a href="<?php echo bloginfo('url'); ?>/blog" class="nav-list--item-link">BLOG</a></li>
        <li class="nav-list--item"><a href="<?php echo bloginfo('url'); ?>/kontakt" class="nav-list--item-link">Kontakt</a></li>
      </ul>
      <button class="button-header">Analiza Rynku</button>
    </nav>
    <nav data-aos="fade-down" class="nav-desktop">
      <ul class="nav-desktop-list">
        <li class="nav-desktop-list--item expandable">
          <a href="" class="nav-desktop-list--item-link-expandable">Nieruchomości<img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/menu-item-expander.png" alt="" /></a>
          <ul class="nav-desktop-list--secondary">
            <li class="nav-desktop-list--item secondary">
              <a href="<?php echo bloginfo('url'); ?>/rynek-pierwotny" class="nav-desktop-list--item-link">Rynek pierwotny</a>
            </li>
            <li class="nav-desktop-list--item secondary">
              <a href="<?php echo bloginfo('url'); ?>/oferty" class="nav-desktop-list--item-link">Rynek wtórny</a>
            </li>
          </ul>
        </li>
        <li class="nav-desktop-list--item expandable">
          <a href="" class="nav-desktop-list--item-link-expandable">Kredyty<img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/menu-item-expander.png" alt="" /></a>
          <ul class="nav-desktop-list--secondary">
            <li class="nav-desktop-list--item secondary">
              <a href="<?php echo bloginfo('url'); ?>/finansowanie" class="nav-desktop-list--item-link">Kredyty hipoteczne</a>
            </li>
            <li class="nav-desktop-list--item secondary">
              <a href="<?php echo bloginfo('url'); ?>/finansowanie" class="nav-desktop-list--item-link">Kredyty gotówkowe</a>
            </li>
            <li class="nav-desktop-list--item secondary">
              <a href="<?php echo bloginfo('url'); ?>/finansowanie" class="nav-desktop-list--item-link">Kredyty firmowe</a>
            </li>
          </ul>
        </li>
        <li class="nav-desktop-list--item"><a href="<?php echo bloginfo('url'); ?>/uslugi" class="nav-desktop-list--item-link">Usługi</a></li>
        <li class="nav-desktop-list--item"><a href="<?php echo bloginfo('url'); ?>/o-nas" class="nav-desktop-list--item-link">O nas</a></li>
        <li class="nav-desktop-list--item"><a href="<?php echo bloginfo('url'); ?>/blog" class="nav-desktop-list--item-link">BLOG</a></li>
        <li class="nav-desktop-list--item">
          <a href="<?php echo bloginfo('url'); ?>/kontakt" class="nav-desktop-list--item-link">Kontakt</a>
        </li>
      </ul>
      <button class="button-header">Analiza Rynku</button>
    </nav>
    <div data-aos="fade-down" class="hamburger-wrapper" role="button">
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
    </div>
  </header>