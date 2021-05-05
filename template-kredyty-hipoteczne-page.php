<?php
/**
 * Template Name: Kredyty hipoteczne
 */
global $pagesData;
$hero = get_field('hero');
$hero_title = $hero['hero_title'];
$page_adress = $hero['page_adress'];
$hero_text_header = $hero['hero_text_header'];
$hero_text = $hero['hero_text'];
$hero_bottom_text = $hero['hero_bottom_text'];
$hero_image = $hero['hero_image'];

$benefits = get_field('benefits');
$benefits_title = $benefits['tytul_sekcji'];
$benefits_subtitle = $benefits['podtytul_sekcji'];
$benefits_boxes = $benefits['boxes'];

$offers = get_field('offers');
$offers_title = $offers['section_text_header'];
$offers_text = $offers['section_text'];
$offers_boxes = $offers['boxes'];

$choice = get_field('choice');
$choice_title = $choice['section_text_header'];
$choice_text = $choice['section_text'];
$choice_boxes = $choice['boxes'];

$form_group = get_field('form_group');
$form_group_template = get_field('form_group', $pagesData['blocks']);
$form_group_title = $form_group['title'] ? $form_group['title'] : $form_group_template['title'];
$form_group_text = $form_group['text'] ? $form_group['text'] : $form_group_template['text'];
$form = $form_group['form'];
$form_placeholder_01 = $form['placeholder_01'] ? $form['placeholder_01'] : $form_group_template['form']['placeholder_01'];
$form_placeholder_02 = $form['placeholder_02'] ? $form['placeholder_02'] : $form_group_template['form']['placeholder_02'];
$form_placeholder_03 = $form['placeholder_03'] ? $form['placeholder_03'] : $form_group_template['form']['placeholder_03'];
$form_checkbox_label_01 = $form['checkbox_label_01'] ? $form['checkbox_label_01'] : $form_group_template['form']['checkbox_label_01'];
$form_checkbox_label_02 = $form['checkbox_label_02'] ? $form['checkbox_label_02'] : $form_group_template['form']['checkbox_label_02'];

$box = get_field('box');
$box_template = get_field('box', $pagesData['blocks']);
$box_image = $box['image'] ? $box['image'] : $box_template['image'];
$box_text = $box['text'] ? $box['text'] : $box_template['text'];
$box_name = $box['imie_i_nazwisko'] ? $box['imie_i_nazwisko'] : $box_template['imie_i_nazwisko'];
$box_comment = $box['komentarz'] ? $box['komentarz'] : $box_template['komentarz'];

get_header(); ?>

<section class="page-title-wrapper">
  <h2 class="page-title">
    <span class="blue-text"><?= $hero_title['niebieski_tekst']; ?></span>
    <span class="orange-text"><?= $hero_title['pomaranczowy_tekst']; ?></span>
  </h2>
  <p class="page-adress"><?= $page_adress; ?></p>
</section>
<section class="hero-credits">
  <div class="hero-credits-wrapper">
    <article class="text-wrapper">
      <h2 class="article-title"><?= $hero_text_header; ?></h2>
      <p class="article-text"><?= $hero_text; ?></p>
      <h3 class="cta-lead-text"><?= $hero_bottom_text; ?></h3>
    </article>
    <div data-aos="fade-up" data-aos-delay="500" class="image-wrapper" style="background: url(<?= $hero_image; ?>); background-size: cover;
        background-position: top left;"></div>
  </div>
</section>
<section class="benefits">
  <h2 class="section-title"><?= $benefits_title; ?></h2>
  <h3 class="section-subtitle"><?= $benefits_subtitle; ?></h3>
  <div class="benefits-boxes-wrapper">
    <?php
      if($benefits_boxes) {
        foreach($benefits_boxes as $box) {
          $ikona = $box['ikona'];
          $text = $box['text'];

          echo
          '<div class="box">
            <img data-aos="zoom-in" class="box-icon" src="' . $ikona . '" alt="" />
            <p class="box-text">' . $text . '</p>
          </div>';
        }
      }
    ?>
  </div>
</section>
<section class="offers">
  <div class="offers-wrapper">
    <div class="text-wrapper">
      <h2 class="section-title"><?= $offers_title; ?></h2>
      <h3 class="section-subtitle"><?= $offers_text; ?></h3>
      <div class="offers-boxes-wrapper">
      <?php
        if($offers_boxes) {
          foreach($offers_boxes as $box) {
            $ikona = $box['ikona'];
            $text = $box['text'];

            echo
            '<div class="offers-box">
              <img data-aos="zoom-in" class="offers-box-icon" src="' . $ikona . '" alt="" />
              <p class="offers-box-text">' . $text . '</p>
            </div>';
          }
        }
      ?>
      </div>
    </div>
    <div data-aos="fade-up" data-aos-delay="500" class="image-wrapper">
      <div class="image">
        <div class="image-text-wrapper">
          <div class="amount-wrapper">
            <p class="amount">4 500 000 <span>zł</span></p>
            <p class="description">wnioskowana kwota kredytu</p>
          </div>
          <div class="datas-wrapper">
            <div class="payment-wrapper">
              <p class="payment">1 175 <span>zł</span></p>
              <p class="description">wysokość raty</p>
            </div>
            <div class="period-wrapper">
              <p class="period">30 <span>lat</span></p>
              <p class="description">okres kredytowania</p>
            </div>
          </div>
          <div class="buttons-wrapper">
            <button class="plus-minus">+</button>
            <button class="plus-minus">-</button>
            <button class="equal">=</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="choice">
  <h2 class="section-title"><?= $choice_title; ?></h2>
  <h3 class="section-subtitle"><?= $choice_text; ?></h3>
  <div class="choice-boxes-wrapper">
    <?php
      if($choice_boxes) {
        foreach($choice_boxes as $box) {
          $ikona = $box['ikona'];
          $title = $box['title'];
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
    <div data-aos="fade-up" data-aos-delay="500" class="image-wrapper" style="background: url(<?= $box_image; ?>); background-size: contain; background-position-y: top; background-position-x: center; background-repeat: no-repeat;">
      <div class="image-text-wrapper">
        <p class="image-text--header"><?= $box_text; ?></p>
        <p class="image-text--name"><?= $box_name; ?></p>
        <p class="image-text--data"><?= $box_comment; ?></p>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>