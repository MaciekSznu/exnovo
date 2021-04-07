<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package test
 */
global $pagesData;
?>
<div class="footer-text">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-text__content" style="background-image: url(<?= get_field('footer_bgimage', $pagesData['home'])['sizes']['large']; ?>)">
                    <div class="footer-text__content--mask">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="content">
                                    <div class="title">
                                        <h2><?= get_field('footer_title', $pagesData['home']); ?></h2>
                                    </div>
                                    <div class="text">
                                        <?= get_field('footer_text', $pagesData['home']) ;?>
                                    </div>
                                    <?php 
                                        $link = get_field('footer_link', $pagesData['home']);
                                        if($link): 
                                    ?>
                                        <div class="link global--button">
                                            <a class="white" href="<?= $link['url']; ?>"><?= $link['title']; ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="image" style="background-image: url(<?= get_field('footer_image', $pagesData['home'])['sizes']['large']; ?>)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer__content">
                    <div class="text">
                        <p><img class="style-svg" src="<?php echo bloginfo('template_url'); ?>/assets/images/logo.svg" alt="Exnovo"> <span><?= date('Y'); ?> Wszelkie prawa zastrzeżone</span></p>
                    </div>
                    <div class="text">
                        <p><a href="<?= get_field('rodo-file', $pagesData['home']); ?>" target="_blank">Polityka prywatności | Rodo</a></p>
                    </div>
                    <div class="text">
                        <p><a href="https://beechstudio.pl">wykonanie: beechstudio</a></p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>