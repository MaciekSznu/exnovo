<?php
/**
 * Template Name: Strona główna
 */
global $pagesData;
get_header(); ?>
<div class="home-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="home-top__content">
                    <div class="top" style="background-image: url(<?= get_field('top_bgimage')['sizes']['large']; ?>)">
                        <div class="top--mask">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="title">
                                        <h1><?= get_field('top_title'); ?></h1>
                                    </div>
                                    <div class="text">
                                        <?= get_field('top_text'); ?>
                                    </div>
                                    <div class="smalltitle">
                                        <h2><?= get_field('top_blockstitle'); ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="row align-items-end no-gutters">
                            <div class="col-xl-6">
                                <div class="blocks blocks-js">
                                    <div class="row no-gutters">
                                        <?php
                                            $customFields = get_field('top_blocks');
                                            foreach($customFields as $key_item => $item):
                                        ?>
                                            <div class="col-xl-6 col-md-6 blocks--border">
                                                <a href="<?= $item['link']; ?>">
                                                    <div data-id="<?= $key_item; ?>" class="item">
                                                        <div class="item__top">
                                                            <div class="title">
                                                                <h3><?= $item['title']; ?></h3>
                                                            </div>
                                                        </div>
													    <div class="item__bottom">
                                                            <div class="link global--button">
                                                                <button class="notitle" type="button"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="image blocks-content-js">
                                    <?php foreach($customFields as $key_item => $item): ?>
                                        <div id="block-<?= $key_item; ?>" class="item <?= ($key_item == 0)? 'active': ''; ?>" style="background-image: url(<?= $item['image']['sizes']['large']; ?>)"></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="home-icons">
    <div class="container">
        <div class="row">
            <?php
                $customFields = get_field('icons_list');
                foreach($customFields as $key_item => $item):
            ?>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <img class="style-svg" src="<?= $item['icon']['sizes']['medium']; ?>">
                        </div>
                        <div class="title">
                            <h2><?= $item['title']; ?></h2>
                        </div>
                        <div class="text">
                            <p><?= $item['text']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
                        <div class="item">
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