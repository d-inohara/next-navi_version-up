<?php
/*
Template Name: カテゴリータグ検索結果画面
*/
?>

<?php
$uri = esc_url(get_template_directory_uri());
//遷移元を判別してパンクズ、リンク、タイトル出し分け
$url = $_SERVER['REQUEST_URI'];
if (strstr($url, '?tax_cat_name')){
    $title_left = $_GET["tax_cat_name"];
    $title_right = $_GET["tax_tag_name"];
    $pankuzu_link = $_GET["tax_cat_slug"];
    $link_term = "category";
}
if (strstr($url, '?tax_tag_name')){
    $title_left = $_GET["tax_tag_name"];
    $title_right = $_GET["tax_cat_name"];
    $pankuzu_link = $_GET["tax_tag_slug"];
    $link_term = "tag";
}
global $wp_query;
$total_results = $wp_query->found_posts;
?>

<?php get_header("nextclubonline"); ?>


<div class="breadcrumb_wrap">
    <div class="inner wrap">
        <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">

            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="<?= esc_url(home_url('nextclubonline')); ?>">
                    <span itemprop="name">HOME</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>

            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="<?= esc_url(home_url('nextclubonline')).'/'. $link_term.'/'.$pankuzu_link  ; ?>">
                    <span itemprop="name"><?php echo $title_left; ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>

            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span itemprop="name"><?php echo $title_right; ?></span>
                <meta itemprop="position" content="3" />
            </li>

        </ul>
    </div>
</div>


<div class="container_wrap wrap">
    <main role="main">
        <section>
        <?php if( $total_results >0 ): ?>

            <?php
            //記事を取得
            if(!empty($_GET["tax_cat_slug"]) && !empty($_GET["tax_tag_slug"]) ){
                $category = $_GET["tax_cat_slug"];
                $tag = $_GET["tax_tag_slug"];
            }else {
                status_header(404);
                wp_redirect( home_url('404') );
                exit;
            }
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; //pagedに渡す変数
            $args = array(
                'paged' => $paged,
                'posts_per_page' => 9,
                'post_type' => array( 'nextclubonline','review','interview','gift','trip' ,'seminar_report','other' ),
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'next_club_category', //条件1：カスタムタクソノミー
                        'field' => 'slug',
                        'terms' => $category, //条件1：タクソノミーターム
                    ),
                    array(
                        'taxonomy' => 'next_club_tag', //条件2：カスタムタクソノミー
                        'field' => 'slug',
                        'terms' => $tag, //条件2：タクソノミーターム
                    )
                )
            );
            query_posts( $args );
            ?>

            <h1 class="title_archive"><?php echo $title_left; ?>/<?php echo $title_right; ?></h1>

            <ul class="news_box_wrapper">
                <?php if(have_posts()): ?>
                    <?php while(have_posts()):the_post(); ?>
                        <li class="news_box menber_only">
                            <a href="<?php the_permalink(); ?>">
                                <figure>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php else : ?>
                                        <img src="<?= $uri ?>/assets/img/next_club/damy1.png" alt="デフォルト画像" />
                                    <?php endif ; ?>

                                    <?php if(get_post_meta($post->ID,'contents_for',true) === 'member'): ?>
                                        <span class="icon_member">メンバー限定</span>
                                    <?php endif; ?>
                                </figure>
                                <div class="news_text">
                                    <h3><?php the_title(); ?></h3>
                                    <p class="category">
                                        <?php
                                        $cat = get_the_terms($post->ID, "next_club_category");
                                        $cat = $cat[0];
                                        ?>
                                        <?php echo $cat->name; ?>
                                    </p>
                                    <time class="time_icon" datetime="<?php the_time('Y.m.d'); ?>"><?php the_time('Y.m.d'); ?></time>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php endif; wp_reset_query();?>
            </ul>
        <?php else: ?>
        <?php
            status_header(404);
            wp_redirect( home_url('404') );
            exit;
        ?>
        <?php endif; ?>
        </section>


        <?php the_posts_pagination(
            array(
                'mid_size' => '1',
                'prev_text' => '',
                'next_text' => '',
                'screen_reader_text' => ' ',
            )
        ); ?>

    </main>

    <?php get_sidebar("nextclubonline"); ?>

</div>

<?php get_footer("nextclubonline"); ?>
