<?php
global $pagesData;

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

// $current_investment = get_field('investment');
// $name = $current_investment['name'];
// $location = $current_investment['location_commune_name'];
// $description = $current_investment['description'];
// $ready_date = $current_investment['ready_date'];
// $price_from = $current_investment['price_from'];
// $price_to = $current_investment['price_to'];
// $area_from = $current_investment['area_from'];
// $area_to = $current_investment['area_to'];
// $price_permeter_from = $current_investment['price_permeter_from'];
// $price_permeter_to = $current_investment['price_permeter_to'];

$name = trim(get_field('investment_name'));
$city = trim(get_field('investment_location_commune_name'));
$description = trim(get_field('investment_description'));
$ready_date = trim(get_field('investment_ready_date'));
$price_from = trim(get_field('investment_price_from'));
$price_to = trim(get_field('investment_price_to'));
$price_permeter_from = trim(get_field('investment_price_permeter_from'));
$price_permeter_to = trim(get_field('investment_price_permeter_to'));
$area_from = trim(get_field('investment_area_from'));
$area_to = trim(get_field('investment_area_to'));
$room_number_from = trim(get_field('investment_room_number_from'));
$room_number_to = trim(get_field('investment_room_number_to'));
$photos = explode(',', trim(get_field('investment_photo_list')));
$photos_path = 'https://static.esticrm.pl/public/images/investments/2167/';
$id = trim(get_field('investment_id'));

$clear_description = html_cut($description, 500);
$short_description = preg_replace('/\s+?(\S+)?$/', '', substr($clear_description, 0, 401));

get_header(); ?>

<?php
    $investmentId = get_field('investment_id');
    $args = [
        'post_type' => 'mieszkania',
        'posts_per_page' => -1,
        'meta_key'		=> 'flat_investmentId',
        'meta_value'	=> $investmentId,
        'post_parent' => 0,
        'post_status' => 'publish',
    ];

    $query = new WP_Query($args);

?>
<section class="page-title-wrapper">
  <h2 class="page-title">
    <span class="blue-text"><?= $name; ?></span>
    <span class="orange-text"><?= $city; ?></span>
  </h2>
  <p class="page-adress">Home> Rynek pierwotny></p>
</section>
<section class="presentation">
  <div class="presentation-wrapper">
    <article class="text-wrapper">
      <?= $short_description; ?>
    </article>
    <div class="image-wrapper" style="background: url(<?= $photos_path . $investmentId . '/' . $photos[0] . '_max.jpg' ?>); background-position-x: center; background-repeat: no-repeat; background-size: cover;"></div>
  </div>
</section>
<section class="summary">
  <div class="summary-wrapper">
    <h3 class="section-title">Informacje</h3>
    <div class="summary-column-01">
      <div class="summary-row">
        <p class="description">termin realizacji</p>
        <p class="value"><?= substr($ready_date, 0, 4); ?> r.</p>
      </div>
      <div class="summary-row">
        <p class="description">ceny od</p>
        <p class="value"><?= number_format($price_from, 0, '', ' '); ?> PLN</p>
      </div>
      <div class="summary-row">
        <p class="description">ceny do</p>
        <p class="value"><?= number_format($price_to, 0, '', ' '); ?> PLN</p>
      </div>
    </div>
    <div class="summary-column-02">
      <div class="summary-row">
        <p class="description">Powierzchnie od</p>
        <p class="value"><?= $area_from; ?> m<sup>2</sup></p>
      </div>
      <div class="summary-row">
        <p class="description">Powierzchnie do</p>
        <p class="value"><?= $area_to; ?> m<sup>2</sup></p>
      </div>
      <div class="summary-row">
        <p class="description">L. pomieszczeń od</p>
        <p class="value"><?= $room_number_from; ?></p>
      </div>
    </div>
    <div class="summary-column-03">
      <div class="summary-row">
        <p class="description">Ceny za mkw. od</p>
        <p class="value"><?= number_format($price_permeter_from, 0, '', ' '); ?> PLN</p>
      </div>
      <div class="summary-row">
        <p class="description">Ceny za mkw. do</p>
        <p class="value"><?= number_format($price_permeter_to, 0, '', ' '); ?> PLN</p>
      </div>
      <div class="summary-row">
        <p class="description">lokalizacja</p>
        <p class="value"><?= $city; ?></p>
      </div>
    </div>
  </div>
</section>
<section class="single-investment-slider">
  <div class="single-offer-slider-img-wrapper">
    <ul class="slider gallery-slider-js">
      <?php
          $post_0 = $query->posts[0];
          $flat_pictures = get_field('flat_pictures', $post_0);
           foreach($flat_pictures as $key_item => $item):
      ?>
        <li class="slide">
          <a href="<?= wp_get_attachment_image_src( $item, 'large')[0]; ?>" class="gallery-image slide__image" style="background-image: url(<?= wp_get_attachment_image_src( $item, 'medium')[0]; ?>)">
            <img class="slide__image" src="<?= wp_get_attachment_image_src( $item, 'large')[0]; ?>" sizes="100vw" alt="<?= get_the_title() . $item; ?>" srcset="<?= wp_get_attachment_image_src( $item, 'large')[0]; ?>, <?= wp_get_attachment_image_src( $item, 'full')[0]; ?> 1280w" style="height: auto;">
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
    <div role="button" class="slider-button-next"></div>
    <div role="button" class="slider-button-prev"></div>
  </div>
</section>
<section class="offers">
  <div class="offers-header">
    <div class="offers-text-wrapper">
      <h3 class="offers-title">Lista <span>lokali</span></h3>
      <p class="offers-text">
        Mamy doświadczenie w sprzedaży nieruchomości mieszkaniowych jak również komercyjnych. Oferujemy kompleksową
        obsługę w
      </p>
    </div>
    <?php

      // $sortPriceAsc = (isset($_GET['price_asc']))? $_GET['price_asc']: '';
      // $sortPriceDesc = (isset($_GET['price_desc']))? $_GET['price_desc']: '';
      // $sortRoomsAsc = (isset($_GET['rooms_asc']))? $_GET['rooms_asc']: '';
      // $sortRoomsDesc = (isset($_GET['rooms_desc']))? $_GET['rooms_desc']: '';

      // $sortProperty = ($sortRoomsAsc || $sortRoomsDesc) ? 'flat_apartmentRoomNumber' : 'flat_price';
      // $sortOrder = ($sortRoomsDesc || $sortPriceDesc) ? 'desc' : 'asc';
      $sortOrder = (isset($_GET['sortOrder'])) ? $_GET['sortOrder']: '';
      // $sortOrderDesc = (isset($_GET['sort_desc']))? $_GET['sort_desc']: '';
      // $sortOrder = $sortOrderDesc ? $sortOrderDesc : 'ASC';

      $paged = get_query_var('paged')? get_query_var('paged') : 1;
      $investmentId = get_field('investment_id');

      $args = [
          'post_type' => 'mieszkania',
          'meta_query' => array(
            array(
              'key' => 'flat_investmentId',
              'value'	=> $investmentId,
            ),
          ),
          'post_parent' => 0,
          'post_status' => 'publish',
          'paged' => $paged,
          'orderby'    => 'meta_value_num',
          'meta_key' => 'flat_price',
          'order' => $sortOrder,
      ];

      // $modificators = [
      //   'meta_key' => $sortProperty,
      //   'order' => $sortOrder,
      // ];

      // $new_args = array_merge(
      //   $args,
      //   $modificators,
      // );

      $query = new WP_Query($args);
    ?>

    <form action="<?= get_the_permalink(); ?>" id="sort-form" class="sort-wrapper" method="get">
        <select name="sortOrder" id="" class="sort-select" onchange="this.form.submit()">
          <option value="">Sortowanie</option>
          <option value="asc" class="sort-option">Cena rosnąco</option>
          <option value="desc" class="sort-option">Cena malejąco</option>
        </select>
    </form>
  </div>
  <div class="offers-wrapper">

    <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post();
      $title = get_the_title();
      $city = get_field('flat_locationCityName');
      $main_type_id = get_field('flat_mainTypeId');
      $area = get_field('flat_areaTotal');
      $alt_title = $main_type_id . ' ' . $area . ' m<sup>2</sup>, ' . $city;
      $offer_title = $title != '' ? $title : $alt_title;
    ?>
    <div class="offer-wrapper">
      <a class="offer-item" href="<?= get_the_permalink(); ?>">
        <div class="offer-image-wrapper">
        <img class="offer-image" src="<?= wp_get_attachment_image_src( get_field('flat_pictures')[0], 'large')[0]; ?>" alt="<?= $offer_title; ?>"/>
        </div>
        <div class="offer-text-wrapper">
          <h4 class="offer-title"><?= $offer_title; ?>, <span><?= $tytul_wpisu['linia_01']; ?></span></h4>
          <h5 class="offer-transaction"><?= get_field('flat_mainTypeId'); ?> na <?= get_field('flat_transaction'); ?></h5>
          <h6 class="offer-price"><?= number_format(get_field('flat_price'), 0, '', ' '); ?> <?= get_field('flat_priceCurrency'); ?></h6>
          <div class="offer-parameters">
            <p class="offer-area"><?= get_field('flat_areaTotal'); ?> m<sup>2</sup></p>
            <p class="offer-rooms">liczba pokoi: &nbsp;<span><?= get_field('flat_apartmentRoomNumber'); ?></span></p>
          </div>
        </div>
      </a>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
    
  </div>
  <div class="pagination-wrapper">
    <p class="offers-amount">ilość ofert: &nbsp;<span> <?= $query->found_posts; ?></span></p>
    <?php
      $argsPagination = [
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $query->max_num_pages,
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