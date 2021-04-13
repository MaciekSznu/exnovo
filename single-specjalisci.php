<?php
global $pagesData;
get_header(); ?>

<?php
    $paged = get_query_var('paged')? get_query_var('paged') : 1;
    $contactId = (get_field('specialist_contactId'))? get_field('specialist_contactId'): 0;
    $args = [
        'post_type' => 'mieszkania',
        'meta_key'		=> 'flat_contactId',
        'meta_value'	=> $contactId,
        'post_parent' => 0,
        'post_status' => 'publish',
        'paged' => $paged,
    ];
    $query = new WP_Query($args);
?>
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
      <div class="offer-item">
        <img class="offer-image" src="<?= wp_get_attachment_image_src( get_field('flat_pictures')[0], 'large')[0]; ?>" alt="<?= get_the_title(); ?>" />
        <div class="offer-text-wrapper">
          <h4 class="offer-title"><?= $offer_title; ?></h4>
          <h5 class="offer-transaction"><?= get_field('flat_mainTypeId'); ?> na <?= get_field('flat_transaction'); ?></h5>
          <h6 class="offer-price"><?= number_format(get_field('flat_price'), 0, '', ' '); ?> <?= get_field('flat_priceCurrency'); ?></h6>
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
<?php get_footer(); ?>