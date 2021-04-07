<?php
/**
 * Template Name: Offer
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
<div class="home-text">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="home-text__content">
                    <?php
                        $customFields = get_field('text_data');
                        foreach($customFields as $key_item => $item):
                    ?>
                        <div id="<?= $key_item + 1; ?>" class="item">
                            <div class="row align-items-center">
                                <div class="col-xl-6 item--end">
                                    <div class="image" style="background-image: url(<?= $item['image']['sizes']['medium']; ?>)">
                                        <div class="image__mask"></div>
                                        <div class="image__text">
                                            <p><?= $item['imagetitle']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="content">
                                        <div class="title">
                                            <h2><?= $item['title']; ?></h2>
                                        </div>
                                        <div class="text">
                                            <?= $item['text']; ?>
                                        </div>
                                        <?php if($item['link']): ?>
                                            <div class="link global--button">
                                                <a class="black" href="<?= $item['link']['url']; ?>"><?= $item['link']['title']; ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>