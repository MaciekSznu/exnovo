<?php
/**
 * Template Name: Oferty
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
<section class="search">
  <div class="search-wrapper">
    <?php
      $args = [
          'post_type' => 'mieszkania',
          'posts_per_page' => -1,
          'post_status' => 'publish'
      ];
      $filters = ['mainTypeId' => [], 'market' => [], 'transaction' => [], 'locationCityName' => [], 'price' => [], 'area' => [], 'year' => [], 'floor' => [], 'rooms' => []];

      $query = new WP_Query($args);

      if($query->have_posts()): while($query->have_posts()) : $query->the_post();
          $mainTypeId = trim(get_field('flat_mainTypeId'));
          $market = trim(get_field('flat_market'));
          $transaction = trim(get_field('flat_transaction'));
          $locationCityName = trim(get_field('flat_locationCityName'));
          $price = trim(get_field('flat_price'));
          $area = trim(get_field('flat_areaTotal'));
          $year = trim(get_field('flat_buildingYear'));
          $floor = trim(get_field('flat_apartmentFloor'));
          $rooms = trim(get_field('flat_apartmentRoomNumber'));

          if(!in_array($mainTypeId, $filters['mainTypeId']) && $mainTypeId != ''){
              $filters['mainTypeId'][] = $mainTypeId;
          }
          if(!in_array($market, $filters['market']) && $market != ''){
            $filters['market'][] = $market;
          }
          if(!in_array($transaction, $filters['transaction']) && $transaction != ''){
            $filters['transaction'][] = $transaction;
          }
          if(!in_array($locationCityName, $filters['locationCityName']) && $locationCityName != ''){
            $filters['locationCityName'][] = $locationCityName;
          }
          if(!in_array($price, $filters['price']) && $price != ''){
            $filters['price'][] = $price;
          }
          if(!in_array($area, $filters['area']) && $area != ''){
            $filters['area'][] = $area;
          }
          if(!in_array($year, $filters['year']) && $year != ''){
            $filters['year'][] = $year;
          }
          if(!in_array($floor, $filters['floor']) && $floor != ''){
            $filters['floor'][] = $floor;
          }
          if(!in_array($rooms, $filters['rooms']) && $rooms != ''){
            $filters['rooms'][] = $rooms;
          }
      endwhile; endif; wp_reset_postdata();

      sort($filters['price']);

      $mainTypeIdGet = (isset($_GET['mainTypeId']))? $_GET['mainTypeId']: '';
      $marketGet = (isset($_GET['market']))? $_GET['market']: '';
      $transactionGet = (isset($_GET['transaction']))? $_GET['transaction']: '';
      $locationCityNameGet = (isset($_GET['locationCityName']))? $_GET['locationCityName']: '';
      $priceFromGet = (isset($_GET['price_from']))? $_GET['price_from']: '';
      $priceToGet = (isset($_GET['price_to']))? $_GET['price_to']: '';
      $areaFromGet = (isset($_GET['area_from']))? $_GET['area_from']: '';
      $areaToGet = (isset($_GET['area_to']))? $_GET['area_to']: '';
      $yearFromGet = (isset($_GET['year_from']))? $_GET['year_from']: '';
      $yearToGet = (isset($_GET['year_to']))? $_GET['year_to']: '';
      $floorFromGet = (isset($_GET['floor_from']))? $_GET['floor_from']: '';
      $floorToGet = (isset($_GET['floor_to']))? $_GET['floor_to']: '';
      $roomsFromGet = (isset($_GET['rooms_from']))? $_GET['rooms_from']: '';
      $roomsToGet = (isset($_GET['rooms_to']))? $_GET['rooms_to']: '';
      $metaQuery = [];

      if($mainTypeIdGet){
          $metaQuery[] = [
              'key'     => 'flat_mainTypeId',
              'value'   => $mainTypeIdGet,
          ];
      }

      if($marketGet){
        $metaQuery[] = [
            'key'     => 'flat_market',
            'value'   => $marketGet,
        ];
      }

      if($transactionGet){
        $metaQuery[] = [
            'key'     => 'flat_transaction',
            'value'   => $transactionGet,
        ];
      }

      if($locationCityNameGet){
        $metaQuery[] = [
            'key'     => 'flat_locationCityName',
            'value'   => $locationCityNameGet,
        ];
      }

      if($priceFromGet){
        $metaQuery[] = [
            'key'     => 'flat_price',
            'value_num'   => $priceFromGet,
            'compare' => '>=',
            // 'type' => 'NUMERIC',
        ];
      }

      if($priceToGet){
        $metaQuery[] = [
            'key'     => 'flat_price',
            'value_num'   => $priceToGet,
            'compare' => '<=',
            // 'type' => 'NUMERIC',
        ];
      }

      if($areaFromGet){
        $metaQuery[] = [
            'key'     => 'flat_areaTotal',
            'value'   => $areaFromGet,
            'compare' => '>=',
            'type' => 'NUMERIC',
        ];
      }

      if($areaToGet){
        $metaQuery[] = [
            'key'     => 'flat_areaTotal',
            'value'   => $areaToGet,
            'compare' => '<=',
            'type' => 'NUMERIC',
        ];
      }

      if($yearFromGet){
        $metaQuery[] = [
            'key'     => 'flat_buildingYear',
            'value'   => $yearFromGet,
            'compare' => '>=',
            'type' => 'NUMERIC',
        ];
      }

      if($yearToGet){
        $metaQuery[] = [
            'key'     => 'flat_buildingYear',
            'value'   => $yearToGet,
            'compare' => '<=',
            'type' => 'NUMERIC',
        ];
      }

      if($floorFromGet){
        $metaQuery[] = [
            'key'     => 'flat_apartmentFloor',
            'value'   => $floorFromGet,
            'compare' => '>=',
            'type' => 'NUMERIC',
        ];
      }

      if($floorToGet){
        $metaQuery[] = [
            'key'     => 'flat_apartmentFloor',
            'value'   => $floorToGet,
            'compare' => '<=',
            'type' => 'NUMERIC',
        ];
      }

      if($roomsFromGet){
        $metaQuery[] = [
            'key'     => 'flat_apartmentRoomNumber',
            'value'   => $roomsFromGet,
            'compare' => '>=',
            'type' => 'NUMERIC',
        ];
      }

      if($roomsToGet){
        $metaQuery[] = [
            'key'     => 'flat_apartmentRoomNumber',
            'value'   => $roomsToGet,
            'compare' => '<=',
            'type' => 'NUMERIC',
        ];
      }

      // $sortPriceAsc = (isset($_GET['price_asc']))? $_GET['price_asc']: '';
      // $sortPriceDesc = (isset($_GET['price_desc']))? $_GET['price_desc']: '';
      // $sortAreaAsc = (isset($_GET['area_asc']))? $_GET['area_asc']: '';
      // $sortAreaDesc = (isset($_GET['area_desc']))? $_GET['area_desc']: '';
      // $sortProperty = ($sortAreaAsc || $sortAreaDesc) ? 'flat_areaTotal' : 'flat_price';
      // $sortOrder = ($sortAreaDesc || $sortPriceDesc) ? 'desc' : 'asc';

      $sortOrderDesc = (isset($_GET['sort_desc']))? $_GET['sort_desc']: '';
      $sortOrder = $sortOrderDesc ? $sortOrderDesc : 'ASC';

      $paged = get_query_var('paged')? get_query_var('paged') : 1;
      $args = [
          'post_type' => 'mieszkania',
          'post_status' => 'publish',
          'post_parent' => 0,
          'paged' => $paged,
          'meta_query' => $metaQuery,
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
    <form action="<?= get_the_permalink(); ?>" id="search-form" class="search-form" method="get">
      <div class="row-wrapper-01">
        <div class="input-wrapper property">
          <select id="input-property" class="input-property" name="mainTypeId">
            <option value="">Rodzaj nieruchomości</option>
            <?php foreach($filters['mainTypeId'] as $option): ?>
              <option value="<?= $option ?>" <?= ($mainTypeIdGet == $option)? 'selected' : ''; ?>><?= ucfirst($option); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="input-wrapper market">
          <select id="input-market" class="input-market" name="market">
            <option value="">Rynek</option>
            <?php foreach($filters['market'] as $option): ?>
              <option value="<?= $option ?>" <?= ($marketGet == $option)? 'selected' : ''; ?>><?= ucfirst($option); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="input-wrapper transaction">
          <select id="input-transaction" class="input-transaction" name="transaction">
            <option value="">Typ transakcji</option>
            <?php foreach($filters['transaction'] as $option): ?>
              <option value="<?= $option ?>" <?= ($transactionGet == $option)? 'selected' : ''; ?>><?= ucfirst($option); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="row-wrapper-02">
        <p class="city_label">Miasto</p>
        <div class="input-wrapper city">
          <select id="input-city" class="input-city" name="locationCityName">
            <option value="">Miasto</option>
            <?php foreach($filters['locationCityName'] as $option): ?>
              <option value="<?= $option ?>" <?= ($locationCityNameGet == $option)? 'selected' : ''; ?>><?= ucfirst($option); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <p class="price_label">Cena</p>
        <div class="price-wrapper">
          <div class="input-wrapper price_from">
            <input
              id="input-price_from"
              class="input-price_from"
              type="number"
              data-step="10000"
              name="price_from"
              placeholder="Od"
              min = "0"
              <?= ($priceFromGet != '') ? 'value="' . $priceFromGet . '"' : ''; ?>
          />
            <div role="button" class="step-up"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
          <div class="input-wrapper price_to">
            <input
              id="input-price_to"
              class="input-price_to"
              type="number"
              data-step="10000"
              name="price_to"
              placeholder="Do"
              <?= ($priceToGet != '') ? 'value="' . $priceToGet . '"' : ''; ?>
          />
            <div role="button" class="step-up"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
        </div>
        <p class="area_label">Powierzchnia</p>
        <div class="area-wrapper">
          <div class="input-wrapper area_from">
            <input
              id="input-area_from"
              class="input-area_from"
              type="number"
              data-step="5"
              name="area_from"
              placeholder="Od"
              min = "1"
              <?= ($areaFromGet != '') ? 'value="' . $areaFromGet . '"' : ''; ?>
          />
            <div role="button" class="step-up"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
          <div class="input-wrapper area_to">
            <input
              id="input-area_to"
              class="input-area_to"
              type="number"
              data-step="5"
              name="area_to"
              placeholder="Do"
              min = "1"
              <?= ($areaToGet != '') ? 'value="' . $areaToGet . '"' : ''; ?>
          />
            <div role="button" class="step-up"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
        </div>
      </div>
      <div class="row-wrapper-03">
        <p class="year_label">Rok budowy</p>
        <div class="year-wrapper">
          <div class="input-wrapper year_from">
            <input
              id="input-year_from"
              class="input-year_from"
              type="number"
              data-step="1"
              name="year_from"
              placeholder="Od"
              min = "1900"
              <?= ($yearFromGet != '') ? 'value="' . $yearFromGet . '"' : ''; ?>
          />
            <div role="button" class="step-up"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
          <div class="input-wrapper year_to">
            <input
              id="input-year_to"
              class="input-year_to"
              type="number"
              data-step="1"
              name="year_to"
              placeholder="Do"
              <?= ($yearToGet != '') ? 'value="' . $yearToGet . '"' : ''; ?>
          />
            <div role="button" class="step-up"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
        </div>
        <p class="floor_label">Piętro</p>
        <div class="floor-wrapper">
          <div class="input-wrapper floor_from">
            <input
              id="input-floor_from"
              class="input-floor_from"
              type="number"
              data-step="1"
              name="floor_from"
              placeholder="Od"
              min = "0"
              <?= ($floorFromGet != '') ? 'value="' . $floorFromGet . '"' : ''; ?>
          />
            <div role="button" class="step-up"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
          <div class="input-wrapper floor_to">
            <input
              id="input-floor_to"
              class="input-floor_to"
              type="number"
              data-step="1"
              name="floor_to"
              placeholder="Do"
              <?= ($floorToGet != '') ? 'value="' . $floorToGet . '"' : ''; ?>
          />
            <div role="button" class="step-up"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
        </div>
        <p class="rooms_label">Liczba pokoi</p>
        <div class="rooms-wrapper">
          <div class="input-wrapper rooms_from">
            <input
              id="input-rooms_from"
              class="input-rooms_from"
              type="number"
              data-step="1"
              name="rooms_from"
              placeholder="Od"
              min = "1"
              <?= ($roomsFromGet != '') ? 'value="' . $roomsFromGet . '"' : ''; ?>
          />
            <div role="button" class="step-up"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
          <div class="input-wrapper rooms_to">
            <input
              id="input-rooms_to"
              class="input-rooms_to"
              type="number"
              data-step="1"
              name="rooms_to"
              placeholder="Do"
              min="1"
              <?= ($roomsToGet != '') ? 'value="' . $roomsToGet . '"' : ''; ?>
          />
            <div role="button" class="step-up"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
        </div>
      </div>
      <div class="row-wrapper-04">
        <div class="input-wrapper submit">
          <button class="submit-search" type="submit">Szukaj oferty</button>
        </div>
        <div class="sort-wrapper">
          <p class="sort-text">Sortuj:</p>
          <button type="submit" name="sort_asc" value="asc" class="sort-button">Cena rosnąco</button>
          <button type="submit" name="sort_desc" value="desc" class="sort-button">Cena malejąco</button>
          <!-- <button type="submit" name="price_desc" value="price_desc" class="sort-button">Cena malejąco</button>
          <button type="submit" name="price_asc" value="price_asc" class="sort-button">Cena rosnąco</button>
          <button type="submit" name="area_desc" value="area_desc" class="sort-button">Powierzchnia malejąco</button>
          <button type="submit" name="area_asc" value="rooms_asc" class="sort-button">Powierzchnia rosnąco</button> -->
        </div>
      </div>
    </form>
  </div>
</section>
<section class="offers">
  <div class="offers-wrapper">
    <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post(); ?>
    <?php
      $title = get_the_title();
      $type = get_field('flat_mainTypeId');
      $transaction = get_field('flat_transaction');
      $area = get_field('flat_areaTotal');
      $city = get_field('flat_locationCityName');
      $alt_title = $city . ', ' . $type . ' ' . $area . ' m<sup>2</sup> na ' . $transaction;

      $offer_title = $title != '' ? $title : $alt_title;
    ?>
    <div class="offer-wrapper">
      <a class="offer-item" href="<?= get_the_permalink(); ?>">
        <div class="offer-image-wrapper">
        <img class="offer-image" src="<?= wp_get_attachment_image_src( get_field('flat_pictures')[0], 'large')[0]; ?>" alt="<?= get_the_title(); ?>" />
        </div>
        <div class="offer-text-wrapper">
          <h4 class="offer-title"><?= $offer_title; ?></h4>
          <h5 class="offer-transaction"><?= get_field('flat_mainTypeId'); ?> na <?= get_field('flat_transaction'); ?></h5>
          <h6 class="offer-price"><?= number_format(get_field('flat_price'), 0, '', ' '); ?> <?= get_field('flat_priceCurrency'); ?></h6>
          <div class="offer-parameters">
            <p class="offer-area"><?= get_field('flat_areaTotal'); ?> m<sup>2</sup></p>
            <p class="offer-rooms">liczba pokoi: &nbsp;<span><?= get_field('flat_apartmentRoomNumber'); ?></span></p>
          </div>
        </div>
      </a>
      <!-- <a href="</?= get_the_permalink(); ?>"><button class="show-offer-button">Zobacz więcej</button></a> -->
    </div>
    <?php endwhile; else: ?>
      <h4 style="width: 100%; font-weight: 300;">Nasza baza jest bardzo szeroka, jednak tym razem nie znaleźliśmy w niej oferty spełniającej wszystkie kryteria, spróbuj poszukać raz jeszcze.</h4>
    <?php  endif; wp_reset_postdata(); ?>
  </div>
  <div class="pagination-wrapper">
    <p class="offers-amount">ilość ofert: &nbsp;<span><?= $query->found_posts; ?></span></p>
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