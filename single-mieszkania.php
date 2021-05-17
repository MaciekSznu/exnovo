<?php
global $pagesData;
get_header();

$main_type_id = get_field('flat_mainTypeId');
$transaction = get_field('flat_transaction');
$price = number_format(get_field('flat_price'), 0, '', ' ');
$currency = get_field('flat_priceCurrency');
$price_m2 = number_format(get_field('flat_pricePermeter'), 0, '', ' ');
$flat_pictures = get_field('flat_pictures');
$location = get_field('flat_locationPlaceName');
$floor = get_field('flat_apartmentFloor');
$floors = get_field('flat_buildingFloornumber');
$area = get_field('flat_areaTotal');
$rooms = get_field('flat_apartmentRoomNumber');
$year = get_field('flat_buildingYear');
$offer_id = get_field('flat_id');
$description = get_field('flat_descriptionWebsite');
$latitude = get_field('flat_locationLatitude');
$longitude = get_field('flat_locationLongitude');

$title = get_the_title();
$city = get_field('flat_locationCityName');
$alt_title = $city . ', ' . $main_type_id . ' ' . $area . ' m<sup>2</sup> na ' . $transaction;
$offer_title = $title != '' ? $title : $alt_title;

$contact_id = get_field('flat_contactId');

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

?>
  <section class="single-offer-slider">
    <div class="single-offer-slider-img-wrapper">
    <ul class="slider gallery-slider-js">
        <?php
          $flat_pictures = get_field('flat_pictures');
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
  <section class="single-offer-data">
    <div class="single-offer-table-wrapper">
      <div class="single-offer-header-wrapper">
        <div class="single-offer-title-wrapper">
          <h2 class="single-offer-title"><?= $offer_title; ?></h2>
          <p class="single-offer-type"><?= $main_type_id; ?> na <?= $transaction; ?></p>
        </div>
        <div class="single-offer-price-wrapper">
          <h3 class="single-offer-price"><?= $price; ?> <?= $currency; ?></h3>
          <p class="single-offer-price-sqm"><?= $price_m2; ?> <?= $currency; ?>/m<sup>2</sup></p>
        </div>
      </div>
      <div class="single-offer-data-wrapper">
        <div class="data-cell area">
          <div class="icon-wrapper"></div>
          <div class="data-wrapper">
            <p class="data-name">powierzchnia</p>
            <p class="data-value"><?= $area; ?> m<sup>2</sup></p>
          </div>
        </div>
        <div class="data-cell rooms">
          <div class="icon-wrapper"></div>
          <div class="data-wrapper">
            <p class="data-name">liczba pokoi</p>
            <p class="data-value"><?= $rooms; ?></p>
          </div>
        </div>
        <div class="data-cell year">
          <div class="icon-wrapper"></div>
          <div class="data-wrapper">
            <p class="data-name">rok budowy</p>
            <p class="data-value"><?= $year; ?></p>
          </div>
        </div>
        <div class="data-cell offer_id">
          <div class="icon-wrapper"></div>
          <div class="data-wrapper">
            <p class="data-name">id oferty</p>
            <p class="data-value"><?= $offer_id; ?></p>
          </div>
        </div>
        <div class="data-cell-data_01">
          <div class="data-row">
            <p class="data-name">Typ nieruchomości:</p>
            <p class="data-value"><?= $main_type_id; ?></p>
          </div>
          <div class="data-row">
            <p class="data-name">Typ transakcji:</p>
            <p class="data-value"><?= $transaction; ?></p>
          </div>
          <div class="data-row">
            <p class="data-name">Lokalizacja:</p>
            <p class="data-value"><?= $location; ?></p>
          </div>
          <div class="data-row">
            <p class="data-name">Piętro:</p>
            <p class="data-value"><?= $floor; ?> na <?= $floors; ?></p>
          </div>
          <div class="data-row">
            <p class="data-name">Cena za m<sup>2</sup>:</p>
            <p class="data-value"><?= $price_m2; ?> <?= $currency; ?></p>
          </div>
        </div>
        <div class="data-cell-data_02">
          <div class="data-row">
            <p class="data-name">Powierzchnia:</p>
            <p class="data-value"><?= $area; ?> m<sup>2</sup></p>
          </div>
          <div class="data-row">
            <p class="data-name">Liczba pokoi:</p>
            <p class="data-value"><?= $rooms; ?></p>
          </div>
          <div class="data-row">
            <p class="data-name">Rok budowy:</p>
            <p class="data-value"><?= $year; ?></p>
          </div>
          <div class="data-row">
            <p class="data-name">Numer oferty:</p>
            <p class="data-value"><?= $offer_id; ?></p>
          </div>
          <div class="data-row">
            <p class="data-name"></p>
            <p class="data-value"></p>
          </div>
        </div>
      </div>
      <div data-aos="fade-up" data-aos-delay="500" class="single-offer-employee-wrapper">
      <?php if($contact_id): ?>
        <div class="member">
          <?php
            $contact_id = get_field('flat_contactId');
 
            $args = [
                'post_type' => 'specjalisci',
                'meta_key'		=> 'specialist_contactId',
                'meta_value'	=> $contact_id,
                'post_status' => 'publish',
                'posts_per_page' => 1
                
            ];
            $query = new WP_Query($args);
          ?>
          <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post();
            $contact = get_field('specialist');
            $contact_img = $contact['image'];
            $contact_phone = $contact['phone'];
            $contact_mail = $contact['mail'];
            $contact_function = $contact['job'];
          ?>
            <img class="member-image" src="<?= $contact_img; ?>" alt="" />
            <div class="member-contact-wrapper">
              <h4 class="member-name"><?= get_the_title(); ?></h4>
              <p class="member-function"><?= $contact_function; ?></p>
              <a href="tel:<?= $contact_phone; ?>" class="member-phone"><?= $contact_phone; ?></a>
              <a href="mailto:<?= $contact_mail; ?>" class="member-email"><?= $contact_mail; ?></a>
              <a href="<?= get_the_permalink(); ?>" class="member-offers">Oferty doradcy</a>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>
      </div>
    </div>
  </section>
  <section class="single-offer-description">
    <div class="section-wrapper">
      <div class="description-wrapper">
        <h3 class="description-title">Opis nieruchomości</h3>
        <?= $description; ?>
      </div>
      <div class="form-wrapper" id="contact-form-wrapper">
        <div class="text-wrapper">
          <h2 class="section-title">Zapytaj <span>o ofertę</span></h2>
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
      </div>
    </div>
  </section>
  <?php if( $latitude && $longitude ): ?>
  <section class="single-offer-map">
    <div class="single-offer-map-wrapper">
      <h3 class="single-offer-map-title">Lokalizacja</h3>
      <div class="single-offer-map-container" id="map">
      </div>
      <script>
        function initMap(){
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: <?= $latitude; ?>, lng: <?= $longitude; ?>},
                zoom: 15,
            });
            var marker = new google.maps.Marker({
                map: map,
                position: {lat: <?= $latitude; ?>, lng: <?= $longitude; ?>},
            });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHmnSXsVL47USPaZyqVs90Hu2bCsa6KVo&callback=initMap" async defer></script>
    </div>
  </section>
  <?php endif; ?>
<?php get_footer(); ?>