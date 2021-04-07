<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package test
 */
global $pagesData;

$footer_header = get_field('footer_header');
$footer_adres = get_field('footer_adres');
$footer_email = get_field('footer_email');
$footer_telefon = get_field('footer_telefon');
$disclaimer = get_field('disclaimer');
?>

<footer class="footer" id="footer">
  <div class="footer-wrapper">
    <div class="title-wrapper">
      <h2 class="footer-title"><?= $footer_header['niebieski_tekst']; ?> <span><?= $footer_header['pomaranczowy_tekst']; ?></span></h2>
    </div>
    <div class="contact-wrapper">
      <div class="box">
        <img class="box-icon" src="<?= $footer_adres['ikona']; ?>" alt="" />
        <div class="box-text-wrapper">
          <p class="box-text"><?= $footer_adres['nazwa_firmy']; ?></p>
          <p class="box-text">
          <?= $footer_adres['ulica']; ?>
            <span>
            <?= $footer_adres['miasto']; ?>
            </span>
          </p>
          <a
            class="box-text-link direction"
            href="<?= $footer_adres['dojazd']; ?>"
            target="_blank"
            rel="noopener noreferrer"
            >Jak dojechać</a
          >
        </div>
      </div>
      <div class="box">
        <img class="box-icon" src="<?= $footer_email['ikona']; ?>" alt="" />
        <div class="box-text-wrapper">
          <p class="box-text"><?= $footer_email['tytul']; ?></p>
          <a class="box-text-link" href="mailto:<?= $footer_email['adres_email']; ?>"><?= $footer_email['adres_email']; ?> </a>
        </div>
      </div>
      <div class="box">
        <img class="box-icon" src="<?= $footer_telefon['ikona']; ?>" alt="" />
        <div class="box-text-wrapper">
          <p class="box-text"><?= $footer_telefon['tytul']; ?></p>
          <a class="box-text-link" href="tel:<?= $footer_telefon['numer_telefonu']; ?>"><?= $footer_telefon['numer_telefonu']; ?></a>
        </div>
      </div>
      <div class="social-links-wrapper">
        <?php
          $social = get_field('social');
          $social_item = $social['social_item'];

          if($social_item) {
            foreach($social_item as $item) {
              $ikona = $item['ikona'];
              $link = $item['link'];

              echo '<a class="social-link" href="'. $link. '" target="_blank" rel="noopener noreferrer"><img src="' . $ikona . '" alt=""/>
          </a>';
            }
          }
        ?>
      </div>
    </div>
  </div>
  <div class="disclaimer-wrapper">
    <p class="disclaimer-text"><?= $disclaimer['tresc']; ?></p>
    <div class="logos-wrapper">
      <a href="http://" target="_blank" rel="noopener noreferrer"
        ><img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/rzetelna_firma_logo.png" alt=""
      /></a>
      <a href="http://" target="_blank" rel="noopener noreferrer"
        ><img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/sppon_logo.png" alt=""
      /></a>
      <a href="http://" target="_blank" rel="noopener noreferrer"
        ><img src="<?php echo bloginfo('template_url'); ?>/assets/graphics/pfrn_logo.png" alt=""
      /></a>
    </div>
  </div>
  <div class="copyrights">
    <p class="copyrights-text">Copyright © ExNovo</p>
    <!-- HREF DO POPRAWY -->
    <a class="copyrights-text-link" href="http://" target="_blank" rel="noopener noreferrer">Regulamin/Rodo</a>
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