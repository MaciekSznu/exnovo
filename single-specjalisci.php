<?php
global $pagesData;
get_header();

$specialist = get_field('specialist');
$specialist_page = get_field('specialist_page');

?>

<?php

  $sortOrder = (isset($_GET['sortOrder'])) ? $_GET['sortOrder']: '';

  $paged = get_query_var('paged')? get_query_var('paged') : 1;
  $contactId = (get_field('specialist_contactId'))? get_field('specialist_contactId'): 0;
  $args = [
      'post_type' => 'mieszkania',
      'meta_query' => array(
        array(
          'key' => 'flat_contactId',
          'value'	=> $contactId,
        ),
      ),
      'post_parent' => 0,
      'post_status' => 'publish',
      'paged' => $paged,
      'orderby'    => 'meta_value_num',
      'meta_key' => 'flat_price',
      'order' => $sortOrder,
  ];

  $query = new WP_Query($args);
?>
<section class="page-title-wrapper">
  <h2 class="page-title">
    <span class="blue-text"><?= $specialist_page['title']; ?></span>
    <span class="orange-text"><?= $specialist['name']; ?></span>
  </h2>
  <?php get_breadcrumb(); ?>
</section>
<section class="specialist-data">
  <div class="specialist-data-wrapper">
    <div class="phone-wrapper">
      <img src="<?= $specialist_page['phone_icon']; ?>" alt="">
      <a href="tel:<?= $specialist['phone']; ?>"><?= $specialist['phone']; ?></a>
    </div>
    <div class="mail-wrapper">
      <img src="<?= $specialist_page['mail_icon']; ?>" alt="">
      <a href="mailto:<?= $specialist['mail']; ?>"><?= $specialist['mail']; ?></a>
    </div>
  </div>
  <form action="<?= get_the_permalink(); ?>" id="sort-form" class="sort-wrapper" method="get">
    <select name="sortOrder" id="" class="sort-select" onchange="this.form.submit()">
      <option value="">Sortowanie</option>
      <option value="asc" class="sort-option">Cena rosnąco</option>
      <option value="desc" class="sort-option">Cena malejąco</option>
    </select>
  </form>
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
<?php get_footer(); ?>