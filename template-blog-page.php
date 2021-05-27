<?php
/**
 * Template Name: Blog
 */
global $pagesData;

$hero = get_field('hero');
$hero_title = $hero['hero_title'];
$page_adress = $hero['page_adress'];

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
  <?php get_breadcrumb(); ?>
</section>
<section class="blog-items">
  <div class="blog-wrapper">
    <?php
      $paged = get_query_var('paged')? get_query_var('paged') : 1;
        $args = [
            'post_type' => 'blog',
            'post_status' => 'publish',
            'post_parent' => 0,
            'paged' => $paged,
            'meta_query' => $metaQuery,
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
      <a class="blog-item" href="<?= get_the_permalink(); ?>">
        <img class="blog-image" src="<?= get_field('main_image'); ?>" alt="<?= get_the_title(); ?>" />
        <div class="blog-text-wrapper">
          <h4 class="blog-title"><?= get_the_title(); ?></h4>
          <?= blog_text_excerpt(); ?>
          <span class="blog-link">Czytaj artykuł</span>
        </div>
      </a>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
  <div class="pagination-wrapper">
    <p class="offers-amount">ilość wpisów: &nbsp;<span><?= $query->found_posts; ?></span></p>
    <?php
      $argsPagination = [
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $query->max_num_pages,
        'mid_size' => 0,
        'next_text' => '<div></div>',
        'prev_text' => '<div></div>',
      ];
    ?>
    <?= paginate_links($argsPagination); ?>
  </div>
</section>
<section class="form">
  <div class="form-wrapper">
    <div class="text-wrapper">
      <h2 class="section-title"><?= $form_group_title; ?></h2>
      <h3 class="section-subtitle">
          <?php
            if (!isset($_POST['submit-form'])) {
              echo 'Wyślij kontakt, a odpowiemy w ciągu 24h';
            }
            elseif (isset($_POST['submit-form'])) {
              $imie = $_POST['imie'];
              $formemail = $_POST['email'];
              $formtelefon = $_POST['telefon'];
              $rodo_01 = $_POST['rodo-01'];
              $rodo_02 = $_POST['rodo-02'];
              $link = get_permalink();
              $message = " Oferta: $link\n Imię i nazwisko: $imie\n Email: $formemail\n Telefon: $formtelefon\n $rodo_01\n $rodo_02 ";
              $to = 'msznurawa@gmail.com';
              $subject = 'Wiadomość z formularza kontaktowego Exnovo';
              $from = '-f test_form@exnovo.pl';
              $headers = ['From' => $from, 'Reply-To' => $formemail, 'Content-type' => 'text/html; charset=iso-8859-1'];
              if (wp_mail($to, $subject, $message, $headers, $from, $link)) {
                  echo 'Twoja wiadomośc została wysłana';
                } else {
                  echo 'Coś poszło nie tak, spróbuj raz jeszcze';
                }
            }
          ?>
          </h3>
          <form action="<?php echo get_permalink(); ?>#contact-form-wrapper" id="contact-form" class="contact-form" method="post">
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
                <input class="rodo-checkbox" type="checkbox" id="rodo-01" name="rodo-01" value="<?= $form_checkbox_label_01; ?>" />
                <div class="rodo-custom-checkbox"></div>
                <label class="rodo-checkbox-label" for="rodo-01"><?= $form_checkbox_label_01; ?></label>
              </div>
              <div class="disclaimer">
                <input class="rodo-checkbox" type="checkbox" id="rodo-02" name="rodo-02" value="<?= $form_checkbox_label_02; ?>" />
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