<?php
/**
 * Template Name: Strona główna
 */
global $pagesData;
$hero = get_field('hero');
$hero_title = $hero['hero_title'];
$hero_text = $hero['hero_text'];
$hero_cta_title = $hero['hero_cta_title'];
$hero_cta_text = $hero['hero_cta_text'];
$hero_cta_link = $hero['hero_cta_link'];
$hero_label_text = $hero['hero_label_text'];
$hero_label_text_orange = $hero['hero_label_text_orange'];

$dev_100 = get_field('dev_100');
$dev_100_title = $dev_100['title'];
$dev_100_text = $dev_100['text'];
$dev_100_cta_title = $dev_100['cta_title'];
$dev_100_cta_text = $dev_100['cta_text'];
$dev_100_cta_link = $dev_100['cta_link'];
$dev_100_image = $dev_100['image'];

$dreams = get_field('marzenia');
$dreams_title = $dreams['tytul_sekcji'];
$dreams_subtitle = $dreams['podtytul_sekcji'];
$dreams_boxes = $dreams['boxes'];

$help = get_field('pomoc');
$help_title = $help['tytul_sekcji'];
$help_subtitle = $help['podtytul_sekcji'];
$help_photos = $help['photos'];

$opinion = get_field('opinie');
$opinion_title = $opinion['tytul_sekcji'];
$opinion_subtitle = $opinion['podtytul_sekcji'];
$opinion_box = $opinion['opinia'];

$cooperation = get_field('cooperation');
$cooperation_template = get_field('cooperation', $pagesData['blocks']);
$cooperation_title = $cooperation['tytul_sekcji'] ? $cooperation['tytul_sekcji'] : $cooperation_template['tytul_sekcji'];
$cooperation_list = $cooperation['lista'] ? $cooperation['lista'] : $cooperation_template['lista'];
$cooperation_cta_text = $cooperation['cta_text'] ? $cooperation['cta_text'] : $cooperation_template['cta_text'];
$cooperation_cta_link = $cooperation['cta_link'] ? $cooperation['cta_link'] : $cooperation_template['cta_link'];
$cooperation_phone = $cooperation['numer_telefonu'] ? $cooperation['numer_telefonu'] : $cooperation_template['numer_telefonu'];
$cooperation_box = $cooperation['box'] ;
$cooperation_box_image = $cooperation_box['image'] ? $cooperation_box['image'] : $cooperation_template['box']['image'];
$cooperation_box_text = $cooperation_box['text'] ? $cooperation_box['text'] : $cooperation_template['box']['text'];
$cooperation_box_name = $cooperation_box['imie_i_nazwisko'] ? $cooperation_box['imie_i_nazwisko'] : $cooperation_template['box']['imie_i_nazwisko'];
$cooperation_box_comment = $cooperation_box['komentarz'] ? $cooperation_box['komentarz'] : $cooperation_template['box']['komentarz'];

get_header(); ?>

<section class="hero">
  <div class="hero-wrapper">
    <div data-aos="fade-up" data-aos-delay="1150" class="hero-title-wrapper">
      <h2 class="hero-title">
        <span class="blue-text"><?= $hero_title['niebieski_tekst']; ?></span>
        <span class="orange-text"><?= $hero_title['pomaranczowy_tekst']; ?></span>
      </h2>
    </div>
    <div data-aos="fade-up" class="hero-image-wrapper">
      <div data-aos="fade-up" data-aos-delay="750" class="hero-text-wrapper">
        <p class="hero-text"><?= $hero_text; ?></p>
        <h3 class="cta-lead-text"><?= $hero_cta_title; ?></h3>
        <button class="button-hero"><a href="<?= $hero_cta_link; ?>"><?= $hero_cta_text; ?></a></button>
      </div>
      <div data-aos="fade-up" data-aos-delay="1500" class="hero-label-wrapper">
        <p class="invest-name"><?= $hero_label_text; ?></p>
        <p class="invest-price"><?= $hero_label_text_orange; ?></p>
      </div>
    </div>
  </div>
</section>
<section class="dev-100">
  <div class="dev-100-wrapper">
    <div data-aos="fade-up" data-aos-delay="500" class="image-wrapper" style="background: url(<?= $dev_100_image; ?>); background-size: cover;
        background-position: center center;"></div>
    <article class="text-wrapper">
      <h2 class="article-title"><?= $dev_100_title; ?></h2>
      <p class="article-text"><?= $dev_100_text; ?></p>
      <h3 class="cta-lead-text"><?= $dev_100_cta_title; ?></h3>
      <button class="button-dev-100"><a href="<?= $dev_100_cta_link; ?>"><?= $dev_100_cta_text; ?></a></button>
    </article>
  </div>
</section>
<section class="dreams">
  <h2 class="section-title"><?= $dreams_title; ?></h2>
  <h3 class="section-subtitle"><?= $dreams_subtitle; ?></h3>
  <div class="boxes-wrapper">
    <?php
      if($dreams_boxes) {
        foreach($dreams_boxes as $box) {
          $ikona = $box['ikona'];
          $title = $box['tytul'];
          $text = $box['text'];

          echo
          '<div class="box">
            <img data-aos="zoom-in" class="box-icon" src="' . $ikona . '" alt="" />
            <h4 class="box-title">' . $title . '</h4>
            <p class="box-text">' . $text . '</p>
          </div>';
        }
      }
    ?>
  </div>
</section>
<section class="help">
  <div class="title-wrapper">
    <h2 class="section-title"><?= $help_title; ?></h2>
    <h3 class="section-subtitle"><?= $help_subtitle; ?></h3>
  </div>
  <div class="images-wrapper">
    <?php
      if($help_photos) {
        foreach($help_photos as $box) {
          $photo = $box['photo'];
          $title = $box['tytul'];
          $text = $box['cta_text'];
          $link = $box['cta_link'];

          echo '<div data-aos="fade-up" class="image-box">
          <div class="image" style="background: url(' . $photo . '); background-size: cover;"></div>
          <h4 class="image-box--title">' . $title . '</h4>
          <a href="' . $link . '"><button class="image-box--button">' . $text . '</button></a>
          </div>';
        }
      }
    ?>
  </div>
</section>
<section class="opinions">
  <div class="title-wrapper">
    <h2 class="section-title"><?= $opinion_title; ?></h2>
    <h3 class="section-subtitle"><?= $opinion_subtitle; ?></h3>
  </div>
  <div class="opinions-wrapper">
    <?php
      if($opinion_box) {
        foreach($opinion_box as $box) {
          $text = $box['tresc_opinii'];
          $autor = $box['autor'];

          echo
          '<div class="opinion-box">
            <p class="opinion-box--text">' . $text . '</p>
            <h4 class="opinion-box--author">' . $autor . '</h4>
          </div>';
        }
      }
    ?>
  </div>
  <div class="arrows-wrapper">
    <div role="button" class="slider-button-prev"></div>
    <div role="button" class="slider-button-next"></div>
  </div>
</section>
<section class="cooperation">
  <div class="cooperation-wrapper">
    <div class="text-wrapper">
      <h2 class="section-title"><?= $cooperation_title; ?></h2>
      <?php
        if($cooperation_list) {
          foreach($cooperation_list as $list_item) {
            $ikona = $list_item['ikona'];
            $text = $list_item['text'];

            echo '<p class="list-item">' . $text . '</p>';
          }
        }
      ?>
      <div class="contact-wrapper">
        <button class="button-contact"><a href="<?= $cooperation_cta_link; ?>"><?= $cooperation_cta_text; ?></a></button>
        <a class="tel" href="tel:+48510912123"><?= $cooperation_phone; ?></a>
      </div>
    </div>
    <div data-aos="fade-up" class="image-wrapper" style="background: url(<?= $cooperation_box_image; ?>); background-size: contain; background-position-y: top; background-position-x: center; background-repeat: no-repeat;">
      <div class="image-text-wrapper">
        <p class="image-text--header"><?= $cooperation_box_text; ?></p>
        <p class="image-text--name"><?= $cooperation_box_name; ?></p>
        <p class="image-text--data"><?= $cooperation_box_comment; ?></p>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>