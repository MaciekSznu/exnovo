<?php
/**
 * Template Name: Rodo
 */
global $pagesData;

$hero = get_field('hero');
$hero_title = $hero['hero_title'];
$page_adress = $hero['page_adress'];
$rodo = get_field('rodo');

get_header(); ?>

<section class="page-title-wrapper">
  <h2 class="page-title">
    <span class="blue-text"><?= $hero_title['niebieski_tekst']; ?></span>
    <span class="orange-text"><?= $hero_title['pomaranczowy_tekst']; ?></span>
  </h2>
  <p class="page-adress"><?= $page_adress; ?></p>
</section>
<section class="rodo">
  <div class="rodo-wrapper">
  <?= $rodo; ?>
  </div>
</section>

<?php get_footer(); ?>