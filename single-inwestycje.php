<?php
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
<?php
    $investmentId = get_field('investment_investmentId');
    $areaTotalArray = [];
    $pricePermeterArray = [];
    $priceArray = [];
    $currency = '';
    $args = [
        'post_type' => 'mieszkania',
        'posts_per_page' => -1,
        'meta_key'		=> 'flat_investmentId',
        'meta_value'	=> $investmentId,
        'post_parent' => 0,
        'post_status' => 'publish',
    ];
    $filters = ['mainTypeId' => [], 'apartmentRoomNumber' => []];
    $query = new WP_Query($args);

    if($query->have_posts()): while($query->have_posts()) : $query->the_post(); 
        $mainTypeId = trim(get_field('flat_mainTypeId'));
        $apartmentRoomNumber = trim(get_field('flat_apartmentRoomNumber'));
        $locationCityName = trim(get_field('flat_locationCityName'));
        $market = trim(get_field('flat_market'));

        $areaTotalArray[] = get_field('flat_areaTotal');
        $pricePermeterArray[] = get_field('flat_pricePermeter');
        $priceArray[] = get_field('flat_price');
        $currency = get_field('flat_priceCurrency');

        if(!in_array($mainTypeId, $filters['mainTypeId']) && $mainTypeId != ''){
            $filters['mainTypeId'][] = $mainTypeId;
        }

        if(!in_array($apartmentRoomNumber, $filters['apartmentRoomNumber']) && $apartmentRoomNumber > 0){
            $filters['apartmentRoomNumber'][] = $apartmentRoomNumber;
        }
    endwhile; endif; wp_reset_postdata(); 

    sort($filters['apartmentRoomNumber']);

    $mainTypeIdGet = (isset($_GET['mainTypeId']))? $_GET['mainTypeId']: '';
    $apartmentRoomNumberGet = (isset($_GET['apartmentRoomNumber']))? $_GET['apartmentRoomNumber']: '';
    $metaQuery = '';

    if($mainTypeIdGet){
        $metaQuery[] = [
            'key'     => 'flat_mainTypeId',
            'value'   => $mainTypeIdGet,
        ];
    }

    if($apartmentRoomNumberGet){
        $metaQuery[] = [
            'key'     => 'flat_apartmentRoomNumber',
            'value'   => $apartmentRoomNumberGet,
        ];
    }
?>

<div class="sub-details">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sub-details__content">
                    <div class="top">
                        <div class="title">
                            <h2>Szczegóły inwestycji</h2>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="info">
                            <h2 class="head">powierzchnia</h2>
                            <p>od <?= min($areaTotalArray); ?> m<sup>2</sup> do <?= max($areaTotalArray); ?> m<sup>2</sup></p>
                        </div>
                        <div class="info">
                            <h2 class="head">cena za m<sup>2</sup></h2>
                            <p>od <?= number_format(min($pricePermeterArray), 0, '', ' '); ?> <?= $currency; ?> do <?= number_format(max($pricePermeterArray), 0, '', ' '); ?> <?= $currency; ?></p>
                        </div>
                        <div class="info">
                            <h2 class="head">ceny mieszkań</h2>
                            <p>od <?= number_format(min($priceArray), 0, '', ' '); ?> <?= $currency; ?> do <?= number_format(max($priceArray), 0, '', ' '); ?> <?= $currency; ?></p>
                        </div>
                        <div class="info">
                            <h2 class="head">rok budowy</h2>
                            <p><?= get_field('investment_buildingYear'); ?></p>
                        </div>
                        <div class="info">
                            <h2 class="head">lokalizacja</h2>
                            <p><?= get_field('investment_locationCityName'); ?></p>
                        </div>
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
            <div class="sub-flats__filters">
                    <?php
                        $paged = get_query_var('paged')? get_query_var('paged') : 1;
                        $args = [
                            'post_type' => 'mieszkania',
                            'meta_key'		=> 'flat_investmentId',
                            'meta_value'	=> $investmentId,
                            'post_parent' => 0,
                            'post_status' => 'publish',
                            'paged' => $paged,
                            'meta_query' => $metaQuery,
                        ];
                        $query = new WP_Query($args);
                    ?>
                    <form method="get" action="<?= get_the_permalink(); ?>">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="select">
                                            <select name="mainTypeId">
                                                <option value="">Rodzaj nieruchomości</option>
                                                <?php foreach($filters['mainTypeId'] as $option): ?>
                                                    <option value="<?= $option ?>" <?= ($mainTypeIdGet == $option)? 'selected' : ''; ?>><?= ucfirst($option); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="select">
                                            <select name="apartmentRoomNumber">
                                                <option value="">Ilość pokoi</option>
                                                <?php foreach($filters['apartmentRoomNumber'] as $option): ?>
                                                    <option value="<?= $option ?>" <?= ($apartmentRoomNumberGet == $option)? 'selected' : ''; ?>><?= ucfirst($option); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="row justify-content-between">
                                    <div class="col-sm">
                                        <div class="button global--button">
                                            <button class="black" type="submit">Szukaj</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="count">
                                            <p>Ilość pozycji: <?= $query->found_posts; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="sub-flats__list">
                    <?php if($query->have_posts()): while($query->have_posts()) : $query->the_post(); ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="image" style="background-image: url()">
                                        <a href="<?= get_the_permalink(); ?>">
                                            <img src="<?= wp_get_attachment_image_src( get_field('flat_pictures')[0], 'large')[0]; ?>" alt="<?= get_the_title(); ?>">
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