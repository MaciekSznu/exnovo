<?php
global $pagesData;

$current_investment = get_field('investment');
$name = $current_investment['name'];
$location = $current_investment['location_commune_name'];
$description = $current_investment['description'];
$ready_date = $current_investment['ready_date'];
$price_from = $current_investment['price_from'];
$price_to = $current_investment['price_to'];
$area_from = $current_investment['area_from'];
$area_to = $current_investment['area_to'];
$price_permeter_from = $current_investment['price_permeter_from'];
$price_permeter_to = $current_investment['price_permeter_to'];

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

<?php
    $investmentId = get_field('investment_id');
    $areaTotalArray = [];
    $pricePermeterArray = [];
    $priceArray = [];
    $currency = '';
    $args = [
        'post_type' => 'mieszkania',
        'posts_per_page' => -1,
        'meta_key'		=> 'flat_investmentId',
        'meta_value'	=> $investmentId,
        'post_parent' => 0,
        'post_status' => 'publish',
    ];
    $filters = ['mainTypeId' => [], 'apartmentRoomNumber' => []];
    $query = new WP_Query($args);

    if($query->have_posts()): while($query->have_posts()) : $query->the_post();
        $mainTypeId = trim(get_field('flat_mainTypeId'));
        $apartmentRoomNumber = trim(get_field('flat_apartmentRoomNumber'));
        $locationCityName = trim(get_field('flat_locationCityName'));
        $year = trim(get_field('flat_buildingYear'));

        $areaTotalArray[] = get_field('flat_areaTotal');
        $pricePermeterArray[] = get_field('flat_pricePermeter');
        $priceArray[] = get_field('flat_price');
        $currency = get_field('flat_priceCurrency');

        if(!in_array($mainTypeId, $filters['mainTypeId']) && $mainTypeId != ''){
            $filters['mainTypeId'][] = $mainTypeId;
        }

        if(!in_array($apartmentRoomNumber, $filters['apartmentRoomNumber']) && $apartmentRoomNumber > 0){
            $filters['apartmentRoomNumber'][] = $apartmentRoomNumber;
        }
    endwhile; endif; wp_reset_postdata();

    sort($filters['apartmentRoomNumber']);

    $mainTypeIdGet = (isset($_GET['mainTypeId']))? $_GET['mainTypeId']: '';
    $apartmentRoomNumberGet = (isset($_GET['apartmentRoomNumber']))? $_GET['apartmentRoomNumber']: '';
    $metaQuery = '';

    if($mainTypeIdGet){
        $metaQuery[] = [
            'key'     => 'flat_mainTypeId',
            'value'   => $mainTypeIdGet,
        ];
    }

    if($apartmentRoomNumberGet){
        $metaQuery[] = [
            'key'     => 'flat_apartmentRoomNumber',
            'value'   => $apartmentRoomNumberGet,
        ];
    }
?>
<section class="page-title-wrapper">
  <h2 class="page-title">
    <span class="blue-text"><?= $name; ?></span>
    <span class="orange-text"><?= $location; ?></span>
  </h2>
</section>
<section class="presentation">
  <div class="presentation-wrapper">
    <article class="text-wrapper">
      <p class="page-adress">Home> Rynek pierwotny> <?= $name; ?> <?= $location; ?></p>
      <?= $description; ?>
    </article>
    <div class="image-wrapper"></div>
  </div>
</section>
<section class="summary">
  <div class="summary-wrapper">
    <h3 class="section-title">Informacje</h3>
    <div class="summary-column-01">
      <div class="summary-row">
        <p class="description">termin realizacji</p>
        <p class="value"><?= substr($ready_date, 0, -2); ?> r.</p>
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
        <p class="value">???</p>
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
        <p class="value"><?= $location; ?></p>
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
            <img class="slide__image" src="<?= wp_get_attachment_image_src( $item, 'large')[0]; ?>" alt="<?= get_the_title() . $item; ?>" style="width: 100%; height: auto;">
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
    <select name="sort" id="offers-sort" class="offers-sort">
      <option value="">Sortowanie</option>
      <option value="price-z-a">Oferty według ceny malejąco</option>
      <option value="price-a-z">Oferty według ceny rosnąco</option>
      <option value="rooms-a-z">Liczba pomieszczeń rosnąco</option>
      <option value="rooms-z-a">Liczba pomieszczeń malejąco</option>
    </select>
  </div>
  <div class="offers-wrapper">
    <?php
      $paged = get_query_var('paged')? get_query_var('paged') : 1;
      $args = [
          'post_type' => 'mieszkania',
          'meta_key'		=> 'flat_investmentId',
          'meta_value'	=> $investmentId,
          'post_parent' => 0,
          'post_status' => 'publish',
          'paged' => $paged,
          'meta_query' => $metaQuery,
      ];
      $query = new WP_Query($args);
    ?>
    <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post();
      $title = get_the_title();
      $city = get_field('flat_locationCityName');
      $main_type_id = get_field('flat_mainTypeId');
      $area = get_field('flat_areaTotal');
      $alt_title = $main_type_id . ' ' . $area . ' m<sup>2</sup>, ' . $city;
      $offer_title = $title != '' ? $title : $alt_title;
    ?>
    <div class="offer-wrapper">
      <div class="offer-item">
        <img class="offer-image" src="<?= wp_get_attachment_image_src( get_field('flat_pictures')[0], 'large')[0]; ?>" alt="<?= $offer_title; ?>"/>
        <div class="offer-text-wrapper">
          <h4 class="offer-title"><?= $offer_title; ?>, <span><?= $tytul_wpisu['linia_01']; ?></span></h4>
          <h5 class="offer-transaction"><?= get_field('flat_mainTypeId'); ?> na <?= get_field('flat_transaction'); ?></h5>
          <h6 class="offer-price"><?= number_format(get_field('flat_price'), 0, '', ' '); ?> <?= get_field('flat_priceCurrency'); ?></h6>
          <div class="offer-parameters">
            <p class="offer-area"><?= get_field('flat_areaTotal'); ?> m<sup>2</sup></p>
            <p class="offer-rooms">liczna pokoi: &nbsp;<span><?= get_field('flat_apartmentRoomNumber'); ?></span></p>
          </div>
        </div>
      </div>
      <a href="<?= get_the_permalink(); ?>"><button class="show-offer-button">Zobacz więcej</button></a>
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