<?php
/**
 * Template Name: Inwestycje
 */
global $pagesData;

$hero = get_field('hero');
$hero_title = $hero['hero_title'];
$page_address = $hero['page_address'];

$partners_title = get_field('partners_title');
$partners_text = get_field('partners_text');
$partners_gallery = get_field('partners_gallery');

$cooperation = get_field('cooperation');
$cooperation_template = get_field('cooperation', $pagesData['blocks']);
$cooperation_title = $cooperation['tytul_sekcji'] ? $cooperation['tytul_sekcji'] : $cooperation_template['tytul_sekcji'];
$cooperation_list = $cooperation['lista'] ? $cooperation['lista'] : $cooperation_template['lista'];
$cooperation_cta_text = $cooperation['cta_text'] ? $cooperation['cta_text'] : $cooperation_template['cta_text'];
$cooperation_cta_link = $cooperation['cta_link'] ? $cooperation['cta_link'] : $cooperation_template['cta_link'];
$cooperation_phone = $cooperation['numer_telefonu'] ? $cooperation['numer_telefonu'] : $cooperation_template['numer_telefonu'];
$cooperation_box = $cooperation['box'] ;
$cooperation_box_image = $cooperation_box['image'] ? $cooperation['box_image'] : $cooperation_template['box']['box_image'];
$cooperation_box_text = $cooperation_box['text'] ? $cooperation['text'] : $cooperation_template['box']['text'];
$cooperation_box_name = $cooperation_box['imie_i_nazwisko'] ? $cooperation['imie_i_nazwisko'] : $cooperation_template['box']['imie_i_nazwisko'];
$cooperation_box_comment = $cooperation_box['komentarz'] ? $cooperation['komentarz'] : $cooperation_template['box']['komentarz'];

get_header(); ?>

<section class="page-title-wrapper">
  <h2 class="page-title">
    <span class="blue-text"><?= $hero_title['niebieski_tekst']; ?></span>
    <span class="orange-text"><?= $hero_title['pomaranczowy_tekst']; ?></span>
  </h2>
  <p class="page-adress"><?= $page_address; ?></p>
</section>
<section class="search">
  <div class="search-wrapper">
    <?php
      $args = [
          'post_type' => 'inwestycje',
          'posts_per_page' => -1,
          'post_status' => 'publish',
      ];
      $filters = ['location_commune_name' => [], 'id' => []];
      $query = new WP_Query($args);

      if($query->have_posts()): while($query->have_posts()) : $query->the_post();
          $location_commune_name = trim(get_field('investment_location_commune_name'));
          $id = trim(get_field('investment_id'));

          if(!in_array($location_commune_name, $filters['location_commune_name']) && $location_commune_name != ''){
              $filters['location_commune_name'][] = $location_commune_name;
          }

          if(!in_array($id, $filters['id']) && $id != ''){
            $filters['id'][] = $id;
        }

      endwhile; endif; wp_reset_postdata();

      sort($filters['location_commune_name']);

      $location_commune_nameGet = (isset($_GET['location_commune_name']))? $_GET['location_commune_name']: '';
      $metaQuery = [];

      if($location_commune_nameGet){
          $metaQuery[] = [
              'key'     => 'investment_location_commune_name',
              'value'   => $location_commune_nameGet,
          ];
      }

      $filteredIds = $filters['id'];
      $paged = get_query_var('paged')? get_query_var('paged') : 1;
      $args = [
          'post_type' => 'inwestycje',
          'post_status' => 'publish',
          'post_parent' => 0,
          'paged' => $paged,
          // 'meta_key'	=> 'investment_id',
          // 'meta_value'   => $filteredIds,
          'meta_query' => $metaQuery,
      ];
      $query = new WP_Query($args);
  ?>
    <form action="<?= get_the_permalink(); ?>" id="search-form" class="search-form cities" method="get">
        <div class="input-wrapper">
          <select id="input-property" class="input-property" name="location_commune_name" onchange="this.form.submit()">
            <option value="">Pokaż wszystkie</option>
            <?php foreach($filters['location_commune_name'] as $option): ?>
            <option value="<?= $option ?>" <?= ($location_commune_nameGet == $option)? 'selected' : ''; ?>><?= ucfirst($option); ?></option>
            <?php endforeach; ?>
          </select>
          <div class="cities-wrapper">
            <button type="submit" name="location_commune_name" value="" class="city-button" id="allCities">Pokaż wszystkie</button>
            <?php foreach($filters['location_commune_name'] as $button): ?>
              <button type="submit" name="<?= ($location_commune_nameGet == $button) ? '' : 'location_commune_name'; ?>" value="<?= $button ?>" class="city-button" id="<?= $button ?>"><?= ucfirst($button); ?></button>
            <?php endforeach; ?>
          </div>
        </div>
    </form>
  </div>
</section>
<section class="offers">
  <div class="offers-wrapper">
    <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post();

      $name = trim(get_field('investment_name'));
      $city = trim(get_field('investment_location_commune_name'));
      $price_permeter_from = trim(get_field('investment_price_permeter_from'));
      $price_permeter_to = trim(get_field('investment_price_permeter_to'));
      $area_from = trim(get_field('investment_area_from'));
      $area_to = trim(get_field('investment_area_to'));
      $room_number_from = trim(get_field('investment_room_number_from'));
      $room_number_to = trim(get_field('investment_room_number_to'));
      $photos = explode(',', trim(get_field('investment_photo_list')));
      $photos_path = 'https://static.esticrm.pl/public/images/investments/2167/';
      $id = trim(get_field('investment_id'));

    ?>
    <div class="offer-wrapper">
      <div class="offer-item">
        <div class="offer-image-wrapper"><img class="offer-image" src="<?= $photos_path . $id . '/' . $photos[0] . '_max.jpg' ?>" alt="" /></div>
        <div class="offer-text-wrapper">
          <h4 class="offer-title"><?= $name; ?>, <?= $city; ?></h4>
          <div class="rooms-wrapper">
            <p class="rooms-description">liczba pokoi</p>
            <p class="rooms-value">od <?= $room_number_from; ?> do <?= $room_number_to; ?></p>
          </div>
          <div class="prices-wrapper">
            <p class="prices-description">cena za m²</p>
            <p class="prices-value">od <?= number_format(floatval($price_permeter_from), 0, '', ' '); ?> PLN do <?= number_format(floatval($price_permeter_to), 0, '', ' '); ?> PLN</p>
          </div>
          <div class="area-wrapper">
            <p class="area-description">powierzchnia</p>
            <p class="area-value">od <?= $area_from; ?> m<sup>2</sup> do <?= $area_to; ?>m<sup>2</sup></p>
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
        <button class="button-contact"><a href="<?= $cooperation_cta_link; ?>"><?= $cooperation_cta_text; ?></a></button>
        <a class="tel" href="tel:+48510912123"><?= $cooperation_phone; ?></a>
      </div>
    </div>
    <div data-aos="fade-up" data-aos-delay="500" class="image-wrapper" style="background: url(<?= $cooperation_box_image; ?>); background-size: contain; background-position-y: top; background-position-x: center; background-repeat: no-repeat;">
      <div class="image-text-wrapper">
        <p class="image-text--header"><?= $cooperation_box_text; ?></p>
        <p class="image-text--name"><?= $cooperation_box_name; ?></p>
        <p class="image-text--data"><?= $cooperation_box_comment; ?></p>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>