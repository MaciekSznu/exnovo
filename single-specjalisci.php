<?php
global $pagesData;
get_header(); ?>
<div class="sub-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sub-banner__content" style="background-image: url(<?= get_field('banner_image', $pagesData['flats'])['sizes']['large']; ?>)">
                    <div class="sub-banner__content--mask">
                        <div class="title">
                            <h1>Nieruchomości specjalisty</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sub-specialist">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <div class="global__specialist global__specialist--nopadding">
                    <div class="image">
                        <img src="<?= get_field('specialist_image')['sizes']['medium']; ?>" alt="<?= get_the_title(); ?>">
                    </div>
                    <div class="content">
                        <div class="row align-content-between">
                            <div class="col-12">
                                <div class="content--border">
                                    <div class="name">
                                        <h3><?= get_the_title(); ?></h3>
                                    </div>
                                    <div class="job">
                                        <p><?= get_field('specialist_job'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="content--border">
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <div class="info">
                                                <p>
                                                    <span class="head">skontaktuj się z agentem</span>
                                                    <span><a href="tel:<?= get_field('specialist_phone'); ?>"><?= get_field('specialist_phone'); ?></a></span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="info">
                                                <p>
                                                    <span class="head">napisz wiadomość</span>
                                                    <span><a href="mailto:<?= get_field('specialist_mail'); ?>"><?= get_field('specialist_mail'); ?></a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="sub-specialist__back">
                    <div class="link global--button">
                        <a class="black" href="<?= get_the_permalink($pagesData['flats']); ?>">Wróć do wszystkich</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sub-flats">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sub-flats__list">
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
                    <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post(); ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="image" style="background-image: url()">
                                        <a href="<?= get_the_permalink(); ?>">
                                            <img src="<?= get_field('flat_pictures')[0]['sizes']['medium']; ?>" alt="<?= get_the_title(); ?>">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="content">
                                        <div>
                                            <div class="content__top">
                                                <div class="title">
                                                    <h2><a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></h2>
                                                </div>
                                                <div class="spec">
                                                    <p><?= get_field('flat_mainTypeId'); ?> na <?= get_field('flat_transaction'); ?></p>
                                                </div>
                                            </div>
                                            <div class="content__middle">
                                                <div class="info">
                                                    <p class="head">powierzchnia</p>
                                                    <p><?= get_field('flat_areaTotal'); ?> m<sup>2</sup></p>
                                                </div>
                                                <div class="info">
                                                    <p class="head">liczba pokoi</p>
                                                    <p><?= get_field('flat_apartmentRoomNumber'); ?></p>
                                                </div>
                                                <div class="info">
                                                    <p class="head">rok budowy</p>
                                                    <p><?= get_field('flat_buildingYear'); ?></p>
                                                </div>
                                                <div class="info">
                                                    <p class="head">id oferty</p>
                                                    <p><?= get_field('flat_id'); ?></p>
                                                </div>
                                            </div>
                                            <div class="content__bottom">
                                                <div class="price">
                                                    <p><?= number_format(get_field('flat_price'), 0, '', ' '); ?> <?= get_field('flat_priceCurrency'); ?></p>
                                                </div>
                                                <div class="link global--button">
                                                    <a class="black" href="<?= get_the_permalink(); ?>">Zobacz więcej</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
                <div class="sub-flats__pagination">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="sub-flats__pagination--flex-center">
                                <div class="count">
                                    <p>Ilość pozycji: <?= $query->found_posts; ?></p>
                                </div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="navigation">
                                <?php 
                                    $argsPagination = [
                                        'format' => '?paged=%#%',
                                        'current' => max(1, get_query_var('paged')),
                                        'total' => $query->max_num_pages,
                                        'next_text' => '<div></div>',
                                        'prev_text' => '<div></div>',
                                    ];
                                ?>
                                <?= paginate_links($argsPagination); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>