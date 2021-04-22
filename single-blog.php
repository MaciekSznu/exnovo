<?php

global $pagesData;

$title = get_field('tytul_wpisu');
$page_adress = get_field('page_adress');
$main_image = get_field('main_image');
$tresc_wpisu = get_field('tresc_wpisu');
$bottom_image = get_field('bottom_image');

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
    <span class="blue-text"><?= $title['linia_01']; ?></span>
    <span class="orange-text"><?= $title['linia_02']; ?></span>
  </h2>
</section>
<section class="single-blog-hero">
  <p class="page-adress"><?= $page_adress; ?></p>
  <div class="single-blog-hero-img-wrapper">
    <img class="single-blog-hero-img" src="<?= $main_image; ?>" alt="" srcset="" />
  </div>
</section>
<section class="single-blog-content">
  <article class="single-blog-article"><?= $tresc_wpisu; ?></article>
</section>
<section class="bottom-img">
  <div class="single-blog-bottom-img-wrapper">
    <img
      class="single-blog-bottom-img"
      src="<?= $bottom_image; ?>"
      alt=""
      srcset=""
    />
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
<?php get_footer(); ?>