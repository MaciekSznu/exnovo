<?php
/**
 * Template Name: Usługi
 */
global $pagesData;
$hero = get_field('hero');
$hero_title = $hero['hero_title'];
$page_adress = $hero['page_adress'];
$hero_text_header = $hero['hero_text_header'];
$hero_text = $hero['hero_text'];
$hero_bottom_text = $hero['hero_bottom_text'];
$hero_contact = $hero['hero_contact'];
$hero_contact_photo = $hero_contact['photo'];
$hero_contact_text = $hero_contact['text'];
$hero_contact_phone = $hero_contact['phone'];

$buy = get_field('buy');
$buy_text_header = $buy['buy_text_header'];
$buy_text = $buy['buy_text'];
$buy_bottom_text = $buy['buy_bottom_text'];
$buy_cta_text = $buy['buy_cta_text'];

$experience = get_field('experience');
$experience_title = $experience['tytul_sekcji'];
$experience_subtitle = $experience['podtytul_sekcji'];
$experience_boxes = $experience['boxes'];

$form_group = get_field('form_group');
$form_group_title = $form_group['title'];
$form_group_text = $form_group['text'];
$form = $form_group['form'];
$form_placeholder_01 = $form['placeholder_01'];
$form_placeholder_02 = $form['placeholder_02'];
$form_placeholder_03 = $form['placeholder_03'];
$form_checkbox_label_01 = $form['checkbox_label_01'];
$form_checkbox_label_02 = $form['checkbox_label_02'];

$box = get_field('box');
$box_image = $box['image'];
$box_text = $box['text'];
$box_name = $box['imie_i_nazwisko'];
$box_comment = $box['komentarz'];

$blog = get_field('blog');
$blog_title = $blog['tytul_sekcji'];
$blog_subtitle = $blog['podtytul_sekcji'];

get_header(); ?>

<section class="page-title-wrapper">
  <h2 class="page-title">
    <span class="blue-text"><?= $hero_title['niebieski_tekst']; ?></span>
    <span class="orange-text"><?= $hero_title['pomaranczowy_tekst']; ?></span>
  </h2>
</section>
<section class="sell">
  <div class="sell-wrapper">
    <article class="text-wrapper">
      <p class="page-adress"><?= $page_adress; ?></p>
      <h2 class="article-title"><?= $hero_text_header; ?></h2>
      <p class="article-text"><?= $hero_text; ?></p>
      <h3 class="cta-lead-text"><?= $hero_bottom_text; ?></h3>
      <div class="cta-wrapper">
        <img class="cta-img" src="<?= $hero_contact_photo; ?>" alt="" />
        <div class="cta-text-wrapper">
          <p class="cta-text"><?= $hero_contact_text; ?></p>
          <a class="cta-link" href="tel:<?= $hero_contact_phone; ?>"><?= $hero_contact_phone; ?></a>
        </div>
      </div>
    </article>
    <div class="image-wrapper"></div>
  </div>
</section>
<section class="buy">
  <div class="buy-wrapper">
    <article class="text-wrapper">
      <h2 class="article-title"><?= $buy_text_header; ?></h2>
      <p class="article-text"><?= $buy_text; ?></p>
      <h3 class="cta-lead-text"><?= $buy_bottom_text; ?></h3>
      <button class="cta-button"><?= $buy_cta_text; ?></button>
    </article>
    <div class="image-wrapper"></div>
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
<section class="form">
  <div class="form-wrapper">
    <div class="text-wrapper">
      <h2 class="section-title"><?= $form_group_title; ?></h2>
      <h3 class="section-subtitle"><?= $form_group_text; ?></h3>
      <form action="" id="contact-form" class="contact-form" method="post">
        <div class="input-wrapper">
          <input
            id="input-name"
            class="contact-form--input-name"
            type="text"
            name="imie"
            aria-required="true"
            aria-invalid="false"
            placeholder="<?= $form_placeholder_01; ?>"
          />
        </div>
        <div class="input-wrapper">
          <input
            id="input-email"
            class="contact-form--input-email"
            type="email"
            name="email"
            aria-required="true"
            aria-invalid="false"
            placeholder="<?= $form_placeholder_02; ?>"
          />
        </div>
        <div class="input-wrapper">
          <input
            id="input-phone"
            class="contact-form--input-phone"
            type="tel"
            name="telefon"
            aria-required="true"
            aria-invalid="false"
            placeholder="<?= $form_placeholder_03; ?>"
          />
        </div>
        <div class="disclaimers-wrapper">
          <div class="disclaimer">
            <input class="rodo-checkbox" type="checkbox" id="rodo-01" name="rodo-01" />
            <div class="rodo-custom-checkbox"></div>
            <label class="rodo-checkbox-label" for="rodo-01"><?= $form_checkbox_label_01; ?></label>
          </div>
          <div class="disclaimer">
            <input class="rodo-checkbox" type="checkbox" id="rodo-02" name="rodo-02" />
            <div class="rodo-custom-checkbox"></div>
            <label class="rodo-checkbox-label" for="rodo-02"><?= $form_checkbox_label_02; ?></label>
          </div>
        </div>
        <input name="submit-form" class="contact-form--input-submit" type="submit" value="Wyślij zapytanie" />
      </form>
    </div>
    <div class="image-wrapper">
      <div class="image-text-wrapper">
        <p class="image-text--header"><?= $box_text; ?></p>
        <p class="image-text--name"><?= $box_name; ?></p>
        <p class="image-text--data"><?= $box_comment; ?></p>
      </div>
    </div>
  </div>
</section>
<section class="blog">
  <h2 class="section-title"><?= $blog_title; ?></h2>
  <h3 class="section-subtitle"><?= $blog_subtitle; ?></h3>
  <div class="blog-wrapper">
    <!-- TUTAJ QUERY Z OSTATNIMI 3 POSTAMI BLOGA -->
    <!-- <div class="blog-item">
      <img class="blog-image" src="./assets/images/o-nas/blog_image_01.png" alt="" />
      <div class="blog-text-wrapper">
        <h4 class="blog-title">Jak przygotować ofertę sprzedaży nieruchomości?</h4>
        <p class="blog-summary">Jak sprzedać nieruchomość bez pośrednika? Od czego zacząć przygotowanie oferty?</p>
        <a href="" class="blog-link">Czytaj artykuł</a>
      </div>
    </div>
    <div class="blog-item">
      <img class="blog-image" src="./assets/images/o-nas/blog_image_02.png" alt="" />
      <div class="blog-text-wrapper">
        <h4 class="blog-title">Jak przygotować ofertę sprzedaży nieruchomości?</h4>
        <p class="blog-summary">Jak sprzedać nieruchomość bez pośrednika? Od czego zacząć przygotowanie oferty?</p>
        <a href="" class="blog-link">Czytaj artykuł</a>
      </div>
    </div>
    <div class="blog-item">
      <img class="blog-image" src="./assets/images/o-nas/blog_image_01.png" alt="" />
      <div class="blog-text-wrapper">
        <h4 class="blog-title">Jak przygotować ofertę sprzedaży nieruchomości?</h4>
        <p class="blog-summary">Jak sprzedać nieruchomość bez pośrednika? Od czego zacząć przygotowanie oferty?</p>
        <a href="" class="blog-link">Czytaj artykuł</a>
      </div>
    </div> -->
  </div>
</section>

<?php get_footer(); ?>