<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package test
 */
global $pagesData;

$footer_data = get_field('footer', $pagesData['blocks']);
$facebook_link = $footer_data['facebook_link'];
$linkedin_link = $footer_data['linkedin_link'];
$instagram_link = $footer_data['instagram_link'];
$logo_01 = $footer_data['logo_partnera_01'];
$logo_02 = $footer_data['logo_partnera_02'];
$logo_03 = $footer_data['logo_partnera_03'];
$rodo_link = $footer_data['rodo_link'];

?>

<footer class="footer" id="footer">
  <div class="footer-wrapper">
    <div class="title-wrapper">
      <h2 class="footer-title">zapraszamy <span>do kontaktu</span></h2>
    </div>
    <div class="contact-wrapper">
      <div class="box">
        <img class="box-icon" src="<?= get_template_directory_uri(); ?>/assets/graphics/adres.svg" alt="" />
        <div class="box-text-wrapper">
          <p class="box-text">Ex Novo Sp. z o.o.</p>
          <p class="box-text">Jabłoniowa 20/213<span>80-175 Gdańsk</span>
          </p>
          <a
            class="box-text-link direction"
            href="https://g.page/ex-novo-sp--z-o-o-?share"
            target="_blank"
            rel="noopener noreferrer"
            >Jak dojechać</a
          >
        </div>
      </div>
      <div class="box">
        <img class="box-icon" src="<?= get_template_directory_uri(); ?>/assets/graphics/mail.svg" alt="" />
        <div class="box-text-wrapper">
          <p class="box-text">napisz wiadomość</p>
          <a class="box-text-link" href="mailto:biuro@exnovo.pl">biuro@exnovo.pl</a>
        </div>
      </div>
      <div class="box">
        <img class="box-icon" src="<?= get_template_directory_uri(); ?>/assets/graphics/telefon.svg" alt="" />
        <div class="box-text-wrapper">
          <p class="box-text">skontaktuj się z agentem</p>
          <a class="box-text-link" href="tel:+48510363812">+48 510 363 812</a>
        </div>
      </div>
      <div class="social-links-wrapper">
        <a class="social-link" href="<?= $linkedin_link; ?>" target="_blank" rel="noopener noreferrer"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/linkedin.svg" alt=""/></a>
        <a class="social-link" href="<?= $facebook_link; ?>" target="_blank" rel="noopener noreferrer"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/facebook.svg" alt=""/></a>
        <a class="social-link" href="<?= $instagram_link; ?>" target="_blank" rel="noopener noreferrer"><img src="<?= get_template_directory_uri(); ?>/assets/graphics/instagram.svg" alt=""/></a>
      </div>
    </div>
  </div>
  <div class="disclaimer-wrapper">
    <p class="disclaimer-text">Niniejsza strona ma charakter informacyjny, nie stanowi oferty handlowej w rozumieniu Art. 66 § 1 Kodeksu Cywilnego. Zamieszczone na stronie materiały graficzne w tym animacje, wizualizacje, mają charakter wyłącznie poglądowy, a przedstawione w nich modele budynków oraz zagospodarowania terenu mogą podlegać zmianom na etapie realizacji. Zmianie nie ulegną istotne cechy świadczenia oraz funkcjonalność budynków.</p>
    <div class="logos-wrapper">
      <span>
        <img src="<?= $logo_01; ?>" alt=""/>
      </span>
      <span>
        <img src="<?= $logo_02; ?>" alt=""/>
      </span>
      <span>
        <img src="<?= $logo_03; ?>" alt=""/>
      </span>
    </div>
  </div>
  <div class="copyrights">
    <p class="copyrights-text">Copyright © ExNovo</p>
    <a class="copyrights-text-link" href="<?= $rodo_link; ?>" target="_blank" rel="noopener noreferrer">Regulamin/Rodo</a>
    <p class="copyrights-text">
      wykonanie:
      <a class="copyrights-text-link" href="https://beechstudio.pl/" target="_blank" rel="noopener noreferrer"
        >beechstudio</a
      >
    </p>
  </div>
</footer>
<?php wp_footer(); ?>
<script>
      AOS.init({
        offset: 100,
        duration: 750,
        easing: "ease-in-sine",
        delay: 100,
        once: true,
      });
    </script>
</body>
</html>