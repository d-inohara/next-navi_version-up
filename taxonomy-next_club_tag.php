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
                <span itemprop="name"><?php single_cat_title(); ?></span>
                <meta itemprop="position" content="2" />
            </li>

        </ul>
    </div>
</div>


<div class="container_wrap wrap">
    <main role="main">
        <section>

            <h1 class="title_archive"><?php single_cat_title(); ?></h1>

            <?php
                // 現在のタグのIDを取得
                $tag_id = get_queried_object_id();
                $post_ids = get_objects_in_term( $tag_id, 'next_club_tag' );
                // 作成した関数からカテゴリーのオブジェクトを取得
                $post_cats = wp_get_object_terms( $post_ids, 'next_club_category' );

                //現ページのタグ情報を取得
                $tag = get_queried_object();
            ?>
            <?php if( !empty($post_cats >0) ): ?>
            <ul class="tag_list">
                <li><span>絞り込み：</span></li>

                <?php
                // カテゴリーのオブジェクトを利用しタグ一覧を作成
                if( $post_cats ){
                    foreach( $post_cats  as $category ){
                        $url = esc_url(home_url('nextclubonline')).'/'.'category_tag';
                        $url = add_query_arg( array(
                                    'tax_tag_name' => $tag->name,
                                    'tax_tag_slug' => $tag->slug,
                                    'tax_cat_name' => $category->name,
                                    'tax_cat_slug' => $category->slug,
                                ), $url );
                        echo '<li><a href="'.$url.'">' . $category->name . '</a></li>';
                    }
                }
                ?>
            </ul>
            <?php else: ?>
            <?php endif; ?>


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
                                <?= esc_html($cat->name); ?>
                            </p>
                            <time class="time_icon" datetime="<?php the_time('Y.m.d'); ?>"><?php the_time('Y.m.d'); ?></time>
                        </div>
                    </a>
                </li>
                <?php endwhile; ?>
                <?php endif;?>
            </ul>
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
