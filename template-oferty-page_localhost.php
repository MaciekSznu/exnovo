<?php
/**
 * Template Name: Oferty szablon nieaktywny
 */
global $pagesData;

$hero = get_field('hero');
$hero_title = $hero['hero_title'];
$page_adress = $hero['page_adress'];

$form_group = get_field('form_group');
$form_group_title = $form_group['title'];
$form_group_text = $form_group['text'];
$form = $form_group['form'];
$form_placeholder_01 = $form['placeholder_01'];
$form_placeholder_02 = $form['placeholder_02'];
$form_placeholder_03 = $form['placeholder_03'];
$form_checkbox_label_01 = $form['checkbox_label_01'];
$form_checkbox_label_02 = $form['checkbox_label_02'];

$box = get_field('box');
$box_image = $box['image'];
$box_text = $box['text'];
$box_name = $box['imie_i_nazwisko'];
$box_comment = $box['komentarz'];

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
          'post_status' => 'publish'
      ];
      $filters = ['mainTypeId' => [], 'apartmentRoomNumber' => [], 'locationCityName' => [], 'market' => []];
      $query = new WP_Query($args);

      if($query->have_posts()): while($query->have_posts()) : $query->the_post();
          $mainTypeId = trim(get_field('flat_mainTypeId'));
          $apartmentRoomNumber = trim(get_field('flat_apartmentRoomNumber'));
          $locationCityName = trim(get_field('flat_locationCityName'));
          $market = trim(get_field('flat_market'));

          if(!in_array($mainTypeId, $filters['mainTypeId']) && $mainTypeId != ''){
              $filters['mainTypeId'][] = $mainTypeId;
          }

          if(!in_array($apartmentRoomNumber, $filters['apartmentRoomNumber']) && $apartmentRoomNumber > 0){
              $filters['apartmentRoomNumber'][] = $apartmentRoomNumber;
          }

          if(!in_array($locationCityName, $filters['locationCityName']) && $locationCityName != ''){
              $filters['locationCityName'][] = $locationCityName;
          }

          if(!in_array($market, $filters['market']) && $market != ''){
              $filters['market'][] = $market;
          }
      endwhile; endif; wp_reset_postdata();

      sort($filters['apartmentRoomNumber']);

      $mainTypeIdGet = (isset($_GET['mainTypeId']))? $_GET['mainTypeId']: '';
      $apartmentRoomNumberGet = (isset($_GET['apartmentRoomNumber']))? $_GET['apartmentRoomNumber']: '';
      $locationCityNameGet = (isset($_GET['locationCityName']))? $_GET['locationCityName']: '';
      $marketGet = (isset($_GET['market']))? $_GET['market']: '';
      $metaQuery = [];

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

      if($locationCityNameGet){
          $metaQuery[] = [
              'key'     => 'flat_locationCityName',
              'value'   => $locationCityNameGet,
          ];
      }

      if($marketGet){
          $metaQuery[] = [
              'key'     => 'flat_market',
              'value'   => $marketGet,
          ];
      }

      $paged = get_query_var('paged')? get_query_var('paged') : 1;
      $args = [
          'post_type' => 'mieszkania',
          'post_status' => 'publish',
          'post_parent' => 0,
          'paged' => $paged,
          'meta_query' => $metaQuery,
      ];
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
          </select>
        </div>
      </div>
      <div class="row-wrapper-02">
        <p class="price_label">Cena</p>
        <div class="price-wrapper">
          <div class="input-wrapper price_from">
            <input
              id="input-price_from"
              class="input-price_from"
              type="number"
              step="10000"
              name="price_from"
              placeholder="Od"
            />
            <div role="button" class="step-up"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
          <div class="input-wrapper price_to">
            <input
              id="input-price_to"
              class="input-price_to"
              type="number"
              step="10000"
              name="price_to"
              placeholder="Do"
            />
            <div role="button" class="step-up"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
        </div>
        <p class="area_label">Powierzchnia</p>
        <div class="area-wrapper">
          <div class="input-wrapper area_from">
            <input
              id="input-area_from"
              class="input-area_from"
              type="number"
              step="1"
              name="area_from"
              placeholder="Od"
            />
            <div role="button" class="step-up"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
          <div class="input-wrapper area_to">
            <input
              id="input-area_to"
              class="input-area_to"
              type="number"
              step="1"
              name="area_to"
              placeholder="Do"
            />
            <div role="button" class="step-up"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
        </div>
        <p class="year_label">Rok budowy</p>
        <div class="year-wrapper">
          <div class="input-wrapper year_from">
            <input
              id="input-year_from"
              class="input-year_from"
              type="number"
              step="1"
              name="year_from"
              placeholder="Od"
            />
            <div role="button" class="step-up"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
          <div class="input-wrapper year_to">
            <input
              id="input-year_to"
              class="input-year_to"
              type="number"
              step="1"
              name="year_to"
              placeholder="Do"
            />
            <div role="button" class="step-up"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
        </div>
      </div>
      <div class="row-wrapper-03">
        <p class="floor_label">Piętro</p>
        <div class="floor-wrapper">
          <div class="input-wrapper floor_from">
            <input
              id="input-floor_from"
              class="input-floor_from"
              type="number"
              step="1"
              name="floor_from"
              placeholder="Od"
            />
            <div role="button" class="step-up"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
          <div class="input-wrapper floor_to">
            <input
              id="input-floor_to"
              class="input-floor_to"
              type="number"
              step="1"
              name="floor_to"
              placeholder="Do"
            />
            <div role="button" class="step-up"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
        </div>
        <p class="rooms_label">Liczba pokoi</p>
        <div class="rooms-wrapper">
          <div class="input-wrapper rooms_from">
            <input
              id="input-rooms_from"
              class="input-rooms_from"
              type="number"
              min="1"
              step="1"
              name="rooms_from"
              placeholder="Od"
            />
            <div role="button" class="step-up"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
          <div class="input-wrapper rooms_to">
            <input
              id="input-rooms_to"
              class="input-rooms_to"
              type="number"
              min="1"
              step="1"
              name="rooms_to"
              placeholder="Do"
            />
            <div role="button" class="step-up"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
            <div role="button" class="step-down"><img src="./assets/graphics/menu-item-expander.png" alt="" /></div>
          </div>
        </div>
        <div class="input-wrapper submit">
          <button class="submit-search" type="submit">Szukaj oferty</button>
        </div>
      </div>
    </form>
    <div class="sort-wrapper">
      <p class="sort-text">Sortuj:</p>
      <button class="sort-button">Cena rosnąco</button>
      <button class="sort-button">Cena malejąco</button>
    </div>
  </div>
</section>
<section class="offers">
  <div class="offers-wrapper">
    <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post(); ?>
    <div class="offer-wrapper">
      <div class="offer-item">
        <img class="offer-image" src="<?= wp_get_attachment_image_src( get_field('flat_pictures')[0], 'large')[0]; ?>" alt="<?= get_the_title(); ?>" />
        <div class="offer-text-wrapper">
          <h4 class="offer-title"><?= get_the_title(); ?></h4>
          <h5 class="offer-transaction"><?= get_field('flat_mainTypeId'); ?> na <?= get_field('flat_transaction'); ?></h5>
          <h6 class="offer-price">1 200 000 zł</h6>
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