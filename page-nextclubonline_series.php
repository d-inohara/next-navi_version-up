/*
Template Name: ネクストクラブオンライン記事シリーズ一覧
*/

<?php $uri = esc_url(get_template_directory_uri()); ?>

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
                <span itemprop="name">記事シリーズ一覧</span>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </div>
</div>


<div class="container_wrap wrap">
    <main role="main">
        <section>

            <h1 class="title_archive">記事シリーズ一覧</h1>

            <?php
            // 1ページあたりに表示するタクソノミーの数
            $per_page = 12;

            $terms_query = new WP_Term_Query( array(
                'taxonomy' => 'next_club_category',
                'hide_empty' => true,
            ) );

            $total_terms = count( $terms_query->get_terms() );

            // 現在のページ番号を取得
            $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

            // 現在のページに表示するタームの配列
            $terms = array_slice( $terms_query->get_terms(), ( $current_page - 1 ) * $per_page, $per_page );

            // 投稿が紐づけられたタームのみを抽出
            $terms_with_posts = array();
            foreach ( $terms as $term ) {
                $args = array(
                    'post_type' => array('nextclubonline','review','interview','gift','trip', 'seminar_report','other'),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'next_club_category',
                            'field' => 'slug',
                            'terms' => $term->slug,
                        ),
                    ),
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                    $terms_with_posts[] = array(
                        'term' => $term,
                        'latest_post_date' => $query->posts[0]->post_date,
                    );
                }
            }

            // 日にち順に並び替え
            usort( $terms_with_posts, function( $a, $b ) {
                return strtotime( $b['latest_post_date'] ) - strtotime( $a['latest_post_date'] );
            } );
            ?>
            <ul class="news_box_wrapper">
                <?php foreach($terms_with_posts as $term_with_post): ?>
                    <?php
                    $term = $term_with_post['term'];
                    ?>
                    <li class="news_box menber_only">
                        <a href="<?= esc_url(get_term_link($term)); ?>">
                            <figure>
                                <?php
                                $term_id = $term->term_id;
                                $cat_img = SCF::get_term_meta($term_id, 'next_club_category', 'category_thumbnail');
                                $img_url = wp_get_attachment_image_src($cat_img ,'full'); ?>
                                <?php if ($img_url) : ?>
                                    <img src="<?= $img_url[0] ?>" alt="<?= esc_html($term->name); ?>">
                                <?php else : ?>
                                    <img src="<?= $uri ?>/assets/img/next_club/damy1.png" alt="デフォルト画像" />
                                <?php endif ; ?>
                            </figure>
                            <div class="news_text">
                                <h3><?= esc_html($term->name); ?></h3>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>


        <?php
        if ($total_terms > 1) :
            $links = paginate_links(array(
                'type' => 'array',
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '?paged=%#%',
                'current' => $current_page,
                'total' => ceil($total_terms / $per_page),
                'mid_size' => '1',
                'prev_text' => '',
                'next_text' => '',
                'end_size' => '0',
            ));

            ?>

            <nav class="navigation pagination">
                <div class="nav-links">
                    <?php if(is_array($links)): ?>
                        <?php foreach($links as $link): ?>
                            <?= $link; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </nav>
        <?php endif; ?>

    </main>

    <?php get_sidebar("nextclubonline"); ?>

</div>

<?php get_footer("nextclubonline"); ?>
