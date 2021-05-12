<?php
/**
 * Template Name: O nas
 */
global $pagesData;
$hero = get_field('hero');
$hero_title = $hero['hero_title'];
$page_adress = $hero['page_adress'];
$hero_text_header = $hero['hero_text_header'];
$hero_text = $hero['hero_text'];
$hero_bottom_text = $hero['hero_bottom_text'];
$hero_image = $hero['hero_image'];

$experience = get_field('experience');
$experience_title = $experience['tytul_sekcji'];
$experience_subtitle = $experience['podtytul_sekcji'];
$experience_boxes = $experience['boxes'];

$team = get_field('team');
$team_title = $team['title'];
$team_text = $team['text'];
$team_member = $team['pracownicy'];

$how = get_field('how');
$how_title = $how['tytul_sekcji'];
$how_subtitle = $how['podtytul_sekcji'];
$how_boxes = $how['boxes'];

$offers = get_field('oferty');
$offers_title = $offers['tytul_sekcji'];
$offers_subtitle = $offers['podtytul_sekcji'];
$offers_cta_text = $offers['cta_text'];
$offers_cta_link = $offers['cta_link'];
$oferta = $offers['oferta'];
$oferta_nazwa = $oferta['nazwa_inwestycji'];
$oferta_pokoje = $oferta['liczba_pokoi'];
$oferta_cena_m2 = $oferta['cena_m2'];
$oferta_area = $oferta['powierzchnia'];
$oferta_photo = $oferta['photo'];

$blog = get_field('blog');
$blog_title = $blog['tytul_sekcji'];
$blog_subtitle = $blog['podtytul_sekcji'];

get_header(); ?>

<section class="page-title-wrapper">
  <h2 class="page-title">
    <span class="blue-text"><?= $hero_title['niebieski_tekst']; ?></span>
    <span class="orange-text"><?= $hero_title['pomaranczowy_tekst']; ?></span>
  </h2>
  <p class="page-adress"><?= $page_adress; ?></p>
</section>
<section class="hands">
  <div class="hands-wrapper">
    <article class="text-wrapper">
      <h2 class="article-title"><?= $hero_text_header; ?></h2>
      <p class="article-text"><?= $hero_text; ?></p>
      <h3 class="cta-lead-text"><?= $hero_bottom_text; ?></h3>
    </article>
    <div data-aos="fade-up" data-aos-delay="500" class="image-wrapper" style="background: url(<?= $hero_image; ?>); background-size: cover;
        background-position: top left;"></div>
  </div>
</section>
<section class="experience">
  <h2 class="section-title"><?= $experience_title; ?></h2>
  <h3 class="section-subtitle"><?= $experience_subtitle; ?></h3>
  <div class="experience-boxes-wrapper">
    <?php
      if($experience_boxes) {
        foreach($experience_boxes as $box) {
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
<section class="team">
  <h2 class="section-title"><?= $team_title; ?></h2>
  <h3 class="section-subtitle"><?= $team_text; ?></h3>
  <div class="team-members-wrapper">
  <?php
      if($team_member) {
        foreach($team_member as $member) {
          $photo = $member['photo'];
          $photo_desktop = $member['photo_desktop'];
          $name = $member['imie_i_nazwisko'];
          $function = $member['funkcja'];
          $phone = $member['telefon'];
          $email = $member['email'];
          $oferty = $member['oferty_doradcy'];

          echo
          '<div class="member">
            <img
              class="member-image"
              src="' . $photo . '"
              sizes="100vw"
              alt=""
              srcset="' . $photo . ' 1279w, ' . $photo_desktop . ' 1280w"
          />
            <div class="member-contact-wrapper">
              <h4 class="member-name">' . $name . '</h4>
              <p class="member-function">' . $function . '</p>
              <a href="tel:' . $phone . '" class="member-phone">' . $phone . '</a>
              <a href="mailto:' . $email . '" class="member-email">' . $email . '</a>
              <a href="' . $offers . '" class="member-offers">Oferty doradcy</a>
            </div>
          </div>';
        }
      }
    ?>
  </div>
</section>
<section class="how">
  <h2 class="section-title"><?= $how_title; ?></h2>
  <h3 class="section-subtitle"><?= $how_subtitle; ?></h3>
  <div class="boxes-wrapper">
    <?php
      if($how_boxes) {
        foreach($how_boxes as $box) {
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
<section class="offers">
  <div class="offers-wrapper">
    <article class="text-wrapper">
      <h2 class="article-title"><?= $offers_title; ?></h2>
      <p class="article-text"><?= $offers_subtitle; ?></p>
      <button class="button-offers"><a href="<?= $offers_cta_link; ?>"><?= $offers_cta_text; ?></a></button>
    </article>
    <div data-aos="fade-up" data-aos-delay="500" class="offer-wrapper">
      <div class="offer-item">
        <img class="offer-image" src="<?= $oferta_photo; ?>" alt="<?= $oferta_nazwa; ?>" />
        <div class="offer-text-wrapper">
          <h4 class="offer-title"><?= $oferta_nazwa; ?></h4>
          <div class="rooms-wrapper">
            <p class="rooms-description">liczba pokoi</p>
            <p class="rooms-value"><?= $oferta_pokoje; ?></p>
          </div>
          <div class="prices-wrapper">
            <p class="prices-description">cena za m²</p>
            <p class="prices-value"><?= $oferta_cena_m2; ?></p>
          </div>
          <div class="area-wrapper">
            <p class="area-description">powierzchnia</p>
            <p class="area-value"><?= $oferta_area; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="blog">
  <h2 class="section-title"><?= $blog_title; ?></h2>
  <h3 class="section-subtitle"><?= $blog_subtitle; ?></h3>
  <div class="blog-wrapper">
    <?php
      $args = [
        'post_type' => 'blog',
        'posts_per_page' => 3,
        'post_status' => 'publish'
      ];
      $query = new WP_Query($args);

      function blog_text_excerpt() {
        $text = get_field('tresc_wpisu');
        if ( '' != $text ) {
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $excerpt_length = 10;
        $excerpt_more = apply_filters('excerpt_more', '' . '…');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
        }
        return apply_filters('the_excerpt', $text);
      }
    ?>
    <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post(); ?>
      <div class="blog-item">
        <img class="blog-image" src="<?= get_field('main_image'); ?>" alt="<?= get_the_title(); ?>" />
        <div class="blog-text-wrapper">
          <h4 class="blog-title"><?= get_the_title(); ?></h4>
          <?= blog_text_excerpt(); ?>
          <a href="<?= get_the_permalink(); ?>" class="blog-link">Czytaj artykuł</a>
        </div>
      </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</section>

<?php get_footer(); ?>