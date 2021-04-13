<?php
/**
 * Template Name: Inwestycje
 */
global $pagesData;

$hero = get_field('hero');
$hero_title = $hero['hero_title'];
$page_adress = $hero['page_adress'];

$partners_title = get_field('partners_title');
$partners_text = get_field('partners_text');
$partners_gallery = get_field('partners_gallery');

$cooperation = get_field('cooperation');
$cooperation_title = $cooperation['tytul_sekcji'];
$cooperation_list = $cooperation['lista'];
$cooperation_cta_text = $cooperation['cta_text'];
$cooperation_phone = $cooperation['numer_telefonu'];
$cooperation_box = $cooperation['box'];
$cooperation_box_image = $cooperation_box['image'];
$cooperation_box_text = $cooperation_box['text'];
$cooperation_box_name = $cooperation_box['imie_i_nazwisko'];
$cooperation_box_comment = $cooperation_box['komentarz'];

get_header(); ?>

<section class="page-title-wrapper">
  <h2 class="page-title">
    <span class="blue-text"><?= $hero_title['niebieski_tekst']; ?></span>
    <span class="orange-text"><?= $hero_title['pomaranczowy_tekst']; ?></span>
  </h2>
</section>
<section class="search">
  <div class="search-wrapper">
    <p class="page-adress"><?= $page_adress; ?></p>
    <?php
      $args = [
          'post_type' => 'mieszkania',
          'posts_per_page' => -1,
          'post_status' => 'publish',
          'meta_key'	=> 'flat_market',
          'meta_value'  => 'pierwotny',
      ];
      $filters = ['locationCityName' => [], 'investmentId' => []];
      $query = new WP_Query($args);

      if($query->have_posts()): while($query->have_posts()) : $query->the_post();
          $locationCityName = trim(get_field('flat_locationCityName'));
          $investmentId = trim(get_field('flat_investmentId'));

          if(!in_array($locationCityName, $filters['locationCityName']) && $locationCityName != ''){
              $filters['locationCityName'][] = $locationCityName;
          }

          if(!in_array($investmentId, $filters['investmentId']) && $investmentId != ''){
            $filters['investmentId'][] = $investmentId;
        }

      endwhile; endif; wp_reset_postdata();

      sort($filters['locationCityName']);

      $locationCityNameGet = (isset($_GET['locationCityName']))? $_GET['locationCityName']: '';
      $metaQuery = [];

      if($locationCityNameGet){
          $metaQuery[] = [
              'key'     => 'flat_locationCityName',
              'value'   => $locationCityNameGet,
          ];
      }

      $filteredIds = $filters['investmentId'];
      $paged = get_query_var('paged')? get_query_var('paged') : 1;
      $args = [
          'post_type' => 'mieszkania',
          'post_status' => 'publish',
          'post_parent' => 0,
          'paged' => $paged,
          'meta_key'	=> 'flat_investmentId',
          'meta_value'   => $filteredIds,
          'meta_query' => $metaQuery,
      ];
      $query = new WP_Query($args);
  ?>
      <form action="<?= get_the_permalink(); ?>" id="search-form" class="search-form" method="get">
      <div class="row-wrapper-01">
        <div class="input-wrapper property">
          <select id="input-property" class="input-property" name="locationCityName" onchange="this.form.submit()">
            <option value="">Lokalizacja</option>
            <?php foreach($filters['locationCityName'] as $option): ?>
              <option value="<?= $option ?>" <?= ($locationCityNameGet == $option)? 'selected' : ''; ?>><?= ucfirst($option); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
    </form>
    <!-- <div class="sort-wrapper">
      <p class="sort-text">Sortuj:</p>
      <button class="sort-button">Cena rosnąco</button>
      <button class="sort-button">Cena malejąco</button>
    </div> -->
  </div>
</section>
<section class="offers">
  <div class="offers-wrapper">
    <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post();

      $apartmentRoomNumber = trim(get_field('flat_apartmentRoomNumber'));
      $locationCityName = trim(get_field('flat_locationCityName'));

      $areaTotalArray[] = get_field('flat_areaTotal');
      $pricePermeterArray[] = get_field('flat_pricePermeter');
      $priceArray[] = get_field('flat_price');
      $currency = get_field('flat_priceCurrency');
    ?>
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
      <div class="offer-item">
        <img class="offer-image" src="<?= wp_get_attachment_image_src( get_field('flat_pictures')[0], 'large')[0]; ?>" alt="<?= get_the_title(); ?>" />
        <div class="offer-text-wrapper">
          <h4 class="offer-title"><?= $offer_title; ?></h4>
          <h5 class="offer-transaction"><?= get_field('flat_mainTypeId'); ?> na <?= get_field('flat_transaction'); ?></h5>
          <h6 class="offer-price"><?= number_format(min($pricePermeterArray), 0, '', ' '); ?> <?= $currency; ?></h6>
          <div class="offer-parameters">
            <p class="offer-area"><?= get_field('flat_areaTotal'); ?> m<sup>2</sup></p>
            <p class="offer-rooms">liczba pokoi: &nbsp;<span><?= get_field('flat_apartmentRoomNumber'); ?></span></p>
          </div>
        </div>
      </div>
      <a href="<?= get_the_permalink(); ?>"><button class="show-offer-button">Zobacz więcej</button></a>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
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
<section class="partners">
  <div class="title-wrapper">
    <h2 class="section-title"><?= $partners_title; ?></h2>
    <h3 class="section-subtitle"><?= $partners_text; ?></h3>
  </div>
  <div class="partners-logos-wrapper">
    <div class="partner-logo"></div>
    <div class="partner-logo"></div>
    <div class="partner-logo"></div>
    <div class="partner-logo"></div>
    <div class="partner-logo"></div>
    <div class="partner-logo"></div>
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
        <button class="button-contact"><?= $cooperation_cta_text; ?></button>
        <a class="tel" href="tel:+48510912123"><?= $cooperation_phone; ?></a>
      </div>
    </div>
    <div data-aos="fade-up" class="image-wrapper">
      <div class="image-text-wrapper">
        <p class="image-text--header"><?= $cooperation_box_text; ?></p>
        <p class="image-text--name"><?= $cooperation_box_name; ?></p>
        <p class="image-text--data"><?= $cooperation_box_comment; ?></p>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>