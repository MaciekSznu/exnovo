<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */
global $pagesData;
global $currentLangData;

$menu_button_link = get_field('menu_button_link', $pagesData['blocks']);
$menu_button_text = get_field('menu_button_text', $pagesData['blocks']);

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
      <a href="<?php echo bloginfo('url'); ?>" class="header-link"><img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/logo.svg" alt="Exnovo - planujesz sprzedać lub kupić nieruchomość w Trójmieście? Wiesz jakie to absorbujące? Dlatego chętnie Ci pomożemy." /></a>
    </h1>
    <nav class="nav">
      <ul class="nav-list">
        <li class="nav-list--item expandable">
          <span class="nav-list--item-link-expandable">Nieruchomości<img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/menu-item-expander.png" alt="" /></span>
          <ul class="nav-list--secondary">
            <li class="nav-list--item secondary primary-market">
              <a href="<?php echo bloginfo('url'); ?>/rynek-pierwotny" class="nav-list--item-link">Rynek pierwotny</a>
            </li>
            <li class="nav-list--item secondary secondary-market">
              <a href="<?php echo bloginfo('url'); ?>/oferty" class="nav-list--item-link">Rynek wtórny</a>
            </li>
          </ul>
        </li>
        <li class="nav-list--item expandable loans">
          <span class="nav-list--item-link-expandable">Kredyty<img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/menu-item-expander.png" alt="" /></span>
          <ul class="nav-list--secondary">
            <li class="nav-list--item secondary mortgage">
              <a href="<?php echo bloginfo('url'); ?>/kredyty-hipoteczne" class="nav-list--item-link">Kredyty hipoteczne</a>
            </li>
            <li class="nav-list--item secondary cash">
              <a href="<?php echo bloginfo('url'); ?>/kredyty-gotowkowe" class="nav-list--item-link">Kredyty gotówkowe</a>
            </li>
            <li class="nav-list--item secondary company">
              <a href="<?php echo bloginfo('url'); ?>/kredyty-firmowe" class="nav-list--item-link">Kredyty firmowe</a>
            </li>
          </ul>
        </li>
        <li class="nav-list--item"><a href="<?php echo bloginfo('url'); ?>/nasze-uslugi" class="nav-list--item-link">Usługi</a></li>
        <li class="nav-list--item"><a href="<?php echo bloginfo('url'); ?>/o-nas" class="nav-list--item-link">O nas</a></li>
        <li class="nav-list--item"><a href="<?php echo bloginfo('url'); ?>/blog" class="nav-list--item-link">BLOG</a></li>
        <li class="nav-list--item"><a href="<?php echo bloginfo('url'); ?>/kontakt" class="nav-list--item-link">Kontakt</a></li>
      </ul>
      <button class="button-header"><a href="<?= $menu_button_link; ?>"><?= $menu_button_text; ?></a></button>
    </nav>
    <nav data-aos="fade-down" class="nav-desktop">
      <ul class="nav-desktop-list">
        <li class="nav-desktop-list--item expandable">
          <span class="nav-desktop-list--item-link-expandable">Nieruchomości<img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/menu-item-expander.png" alt="" /></span>
          <ul class="nav-desktop-list--secondary">
            <li class="nav-desktop-list--item secondary primary-market">
              <a href="<?php echo bloginfo('url'); ?>/rynek-pierwotny" class="nav-desktop-list--item-link">Rynek pierwotny</a>
            </li>
            <li class="nav-desktop-list--item secondary secondary-market">
              <a href="<?php echo bloginfo('url'); ?>/oferty" class="nav-desktop-list--item-link">Rynek wtórny</a>
            </li>
          </ul>
        </li>
        <li class="nav-desktop-list--item expandable">
          <span class="nav-desktop-list--item-link-expandable">Kredyty<img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/menu-item-expander.png" alt="" /></span>
          <ul class="nav-desktop-list--secondary">
            <li class="nav-desktop-list--item secondary mortgage">
              <a href="<?php echo bloginfo('url'); ?>/kredyty-hipoteczne" class="nav-desktop-list--item-link">Kredyty hipoteczne</a>
            </li>
            <li class="nav-desktop-list--item secondary cash">
              <a href="<?php echo bloginfo('url'); ?>/kredyty-gotowkowe" class="nav-desktop-list--item-link">Kredyty gotówkowe</a>
            </li>
            <li class="nav-desktop-list--item secondary company">
              <a href="<?php echo bloginfo('url'); ?>/kredyty-firmowe" class="nav-desktop-list--item-link">Kredyty firmowe</a>
            </li>
          </ul>
        </li>
        <li class="nav-desktop-list--item"><a href="<?php echo bloginfo('url'); ?>/nasze-uslugi" class="nav-desktop-list--item-link">Usługi</a></li>
        <li class="nav-desktop-list--item"><a href="<?php echo bloginfo('url'); ?>/o-nas" class="nav-desktop-list--item-link">O nas</a></li>
        <li class="nav-desktop-list--item"><a href="<?php echo bloginfo('url'); ?>/blog" class="nav-desktop-list--item-link">BLOG</a></li>
        <li class="nav-desktop-list--item">
          <a href="<?php echo bloginfo('url'); ?>/kontakt" class="nav-desktop-list--item-link">Kontakt</a>
        </li>
      </ul>
      <button class="button-header"><a href="<?= $menu_button_link; ?>"><?= $menu_button_text; ?></a></button>
    </nav>
    <div data-aos="fade-down" class="hamburger-wrapper" role="button">
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
    </div>
  </header>