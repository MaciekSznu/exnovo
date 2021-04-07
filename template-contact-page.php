<?php
/**
 * Template Name: Kontakt
 */
global $pagesData;
get_header(); ?>
<div class="sub-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sub-banner__content" style="background-image: url(<?= get_field('banner_image')['sizes']['large']; ?>)">
                    <div class="sub-banner__content--mask">
                        <div class="title">
                            <h1><?= get_field('banner_title'); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sub-contact">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="sub-contact__left">
                    <div class="title">
                        <h2><?= get_field('contact_title'); ?></h2>
                    </div>
                    <div class="list">
                        <div class="row">
                            <?php
                                $customFields = get_field('contact_data');
                                foreach($customFields as $key_item => $item):
                            ?>
                                <div class="col-md-6">
                                    <div class="item">
                                        <div class="icon">
                                            <?php if($item['icon']['sizes']['medium']): ?>
                                                <img class="style-svg" src="<?= $item['icon']['sizes']['medium']; ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="content">
                                            <p class="head"><?= $item['title']; ?></p>
                                            <?= $item['text']; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="title">
                        <h2><?= get_field('contact_titlespecialist'); ?></h2>
                    </div>
                    <div class="specialist">
                        <ul>
                            <?php
                                $args = [
                                    'post_type' => 'specjalisci',
                                    'posts_per_page' => -1,
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC',
                                    'post_status' => 'publish',
                                    'post_parent' => 0,
                                ];
                                $query = new WP_Query($args);
                            ?> 
                            <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post(); ?>
                                <li class="item global__specialist">
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
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="info">
                                                                <p>
                                                                    <span class="head">skontaktuj się z agentem</span>
                                                                    <span><a href="tel:<?= get_field('specialist_phone'); ?>"><?= get_field('specialist_phone'); ?></a></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="info">
                                                                <p>
                                                                    <span class="head">napisz wiadomość</span>
                                                                    <span><a href="mailto:<?= get_field('specialist_mail'); ?>"><?= get_field('specialist_mail'); ?></a></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="info">
                                                                <a href="<?= get_the_permalink(); ?>">
                                                                    <span class="head">zobacz </span>
                                                                    <span>oferty</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; endif; wp_reset_postdata(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="sub-contact__right global__form">
                    <div class="title">
                        <h2><?= get_field('form_title', $pagesData['contact']); ?></h2>
                    </div>
                    <div class="form">
                        <?= do_shortcode('[contact-form-7 id="129" title="Formularz kontaktowy"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>