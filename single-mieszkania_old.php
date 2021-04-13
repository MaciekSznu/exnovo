<?php
global $pagesData;
get_header();

// print_r($pagesData);
?>
<div class="sub-single">
    <div class="sub-single__top">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md">
                    <div class="title">
                        <h1><a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></h1>
                    </div>
                    <div class="spec">
                        <p><?= get_field('flat_mainTypeId'); ?> na <?= get_field('flat_transaction'); ?></p>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="price sub-single__top--textright">
                        <p><?= number_format(get_field('flat_price'), 0, '', ' '); ?> <?= get_field('flat_priceCurrency'); ?></p>
                    </div>
                    <div class="spec sub-single__top--textright">
                        <p><?= number_format(get_field('flat_pricePermeter'), 0, '', ' '); ?> <?= get_field('flat_priceCurrency'); ?> / m<sup>2</sup></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-single__bottom">
        <div class="container">

            <div class="row global--custom-row">
                <div class="col-xl-8 global--custom-col">
                    <div class="content">
                        <div class="gallery gallery-js">
                            <ul class="slider gallery-slider-js">
                                <?php
                                    $customFields = get_field('flat_pictures');
                                    echo var_dump($flat_pictures);
                                    foreach($customFields as $key_item => $item):
                                ?>
                                    <li class="slide">
                                        <a href="<?= wp_get_attachment_image_src( $item, 'large')[0]; ?>" class="gallery-image slide__image" style="background-image: url(<?= wp_get_attachment_image_src( $item, 'medium')[0]; ?>)">
                                            <img class="slide__image" src="<?= wp_get_attachment_image_src( $item, 'large')[0]; ?>" alt="<?= get_the_title() . $item; ?>">
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="thumbs">
                            <ul class="slider thumbs-slider-js">
                                <?php foreach($customFields as $key_item => $item): ?>
                                    <li class="slide">
                                        <div class="slide__image" style="background-image: url(<?= wp_get_attachment_image_src( $item, 'medium')[0]; ?>)"></div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="item">
                                        <div class="head"><p>Typ nieruchomości:</p></div>
                                        <div><p><?= get_field('flat_mainTypeId'); ?></p></div>


                                        
                                    </div>
                                    <div class="item">
                                        <div class="head"><p>Typ transakcji:</p></div>
                                        <div><p><?= get_field('flat_transaction'); ?></p></div>
                                    </div>
                                    <div class="item">
                                        <div class="head"><p>Lokalizacja:</p></div>
                                        <div><p><?= get_field('flat_locationPlaceName'); ?></p></div>
                                    </div>
                                    <div class="item">
                                        <div class="head"><p>Piętro:</p></div>
                                        <div><p><?= get_field('flat_apartmentFloor'); ?> na <?= get_field('flat_buildingFloornumber'); ?></p></div>
                                    </div>
                                    <div class="item">
                                        <div class="head"><p>Cena za m2</p></div>
                                        <div><p><?= number_format(get_field('flat_pricePermeter'), 0, '', ' '); ?> <?= get_field('flat_priceCurrency'); ?></p></div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="item">
                                        <div class="head"><p>Powierzchnia:</p></div>
                                        <div><p><?= get_field('flat_areaTotal'); ?> m<sup>2</sup></p></div>
                                    </div>
                                    <div class="item">
                                        <div class="head"><p>Liczba pokoi:</p></div>
                                        <div><p><?= get_field('flat_apartmentRoomNumber'); ?></p></div>
                                    </div>
                                    <div class="item">
                                        <div class="head"><p>Rok budowy:</p></div>
                                        <div><p><?= get_field('flat_buildingYear'); ?></p></div>
                                    </div>
                                    <div class="item">
                                        <div class="head"><p>Numer oferty:</p></div>
                                        <div><p><?= get_field('flat_id'); ?></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <h2>Opis nieruchomości</h2>
                        </div>
                        <div class="text">
                            <?= get_field('flat_descriptionWebsite'); ?>
                        </div>
                        <?php if(get_field('flat_locationLatitude') && get_field('flat_locationLongitude')): ?>
                            <div class="title">
                                <h2>Lokalizacja</h2>
                            </div>
                            <div id="map" class="map">
                            </div>
                            <script>
                                function initMap(){
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        center: {lat: <?= get_field('flat_locationLatitude'); ?>, lng: <?= get_field('flat_locationLongitude'); ?>},
                                        zoom: 15,
                                    });
                                    var marker = new google.maps.Marker({
                                        map: map,
                                        position: {lat: <?= get_field('flat_locationLatitude'); ?>, lng: <?= get_field('flat_locationLongitude'); ?>},
                                    });
                                }
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHmnSXsVL47USPaZyqVs90Hu2bCsa6KVo&callback=initMap" async defer></script>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-4 global--custom-col">
                    <div class="side">
                        <div class="side__print">
                            <div class="info">
                                <div class="content">
                                    <div class="head">Wydrukuj ofertę</div>
                                    <div><a href="#" onclick="window.print()">Pobierz</a></div>
                                </div>
                                <div class="icon">
                                    <img class="style-svg" src="<?php echo bloginfo('template_url'); ?>/assets/images/print.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <?php if(get_field('flat_contactId')): ?>
                            <div class="side__specialist">
                                <div class="title">
                                    <h2>Opiekun oferty</h2>
                                </div>
                                <?php
                                    $contactId = get_field('flat_contactId');
                                    $args = [
                                        'post_type' => 'specjalisci',
                                        'meta_key'		=> 'specialist_contactId',
                                        'meta_value'	=> $contactId,
                                        'post_status' => 'publish',
                                        'posts_per_page' => 1
                                        
                                    ];
                                    $query = new WP_Query($args);
                                ?>
                                <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post(); ?>
                                    <div class="image">
                                        <img src="<?= get_field('specialist_image')['sizes']['medium']; ?>" alt="<?= get_the_title(); ?>">
                                    </div>
                                    <div class="name">
                                        <h3><?= get_the_title(); ?></h3>
                                    </div>
                                    <div class="info">
                                        <div class="content">
                                            <div class="head">skontaktuj się z agentem</div>
                                            <div><a href="tel:<?= get_field('specialist_phone'); ?>"><?= get_field('specialist_phone'); ?></a></div>
                                        </div>
                                        <div class="icon">
                                            <img class="style-svg" src="<?php echo bloginfo('template_url'); ?>/assets/images/phone.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="content">
                                            <div class="head">napisz wiadomość</div>
                                            <div><a href="mailto:<?= get_field('specialist_mail'); ?>"><?= get_field('specialist_mail'); ?></a></div>
                                        </div>
                                        <div class="icon">
                                            <img class="style-svg" src="<?php echo bloginfo('template_url'); ?>/assets/images/mail.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="link global--button">
                                        <a class="black" href="<?= get_the_permalink(); ?>">Zobacz oferty </a>
                                    </div>
                                <?php endwhile; endif; wp_reset_postdata(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="side__contact">
                            <div class="title">
                                <h2><?= get_field('form_title', $pagesData['contact']); ?></h2>
                            </div>
                            <div class="global__form">
                                <div class="form">
                                    <?= do_shortcode('[contact-form-7 id="129" title="Formularz kontaktowy"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>