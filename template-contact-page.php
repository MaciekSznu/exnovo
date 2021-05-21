<?php
/**
 * Template Name: Kontakt
 */

global $pagesData;
$hero = get_field('hero');
$hero_title = $hero['hero_title'];
$page_adress = $hero['page_adress'];

$team = get_field('team');
$team_member = $team['pracownicy'];

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

$map = get_field('map_datas');
$latitude = $map['office_latitude'];
$longitude =$map['office_longitude'];

get_header(); ?>

<section class="page-title-wrapper">
  <h2 class="page-title">
    <span class="blue-text"><?= $hero_title['niebieski_tekst']; ?></span>
    <span class="orange-text"><?= $hero_title['pomaranczowy_tekst']; ?></span>
  </h2>
  <p class="page-adress"><?= $page_adress; ?></p>
</section>
<section class="team">
  <div class="team-members-wrapper">
    <?php if($team_member) : ?>

      <?php foreach($team_member as $member) :
        $photo = $member['photo'];
        $photo_desktop = $member['photo_desktop'];
        $name = $member['imie_i_nazwisko'];
        $function = $member['funkcja'];
        $phone = $member['telefon'];
        $email = $member['email'];
        $oferty = $member['oferty_doradcy'];
      ?>

          
        <div class="member">
          <img
            class="member-image"
            src="<?= $photo; ?>"
            sizes="100vw"
            alt=""
            srcset="<?= $photo; ?> 1279w, <?= $photo_desktop; ?> 1280w"
        />
          <div class="member-contact-wrapper">
            <h4 class="member-name"><?= $name; ?></h4>
            <p class="member-function"><?= $function; ?></p>
            <a href="tel:<?= $phone; ?>" class="member-phone"><?= $phone; ?></a>
            <a href="mailto:<?= $email; ?>" class="member-email"><?= $email; ?></a>
            <?php
              if ($oferty != '') {
                echo '<a href="' . $oferty .  '" class="member-offers">Oferty doradcy</a>';
              }
            ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
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
    <div class="map-wrapper" id="map">
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

<?php get_footer(); ?>