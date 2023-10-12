<?php $uri = esc_url(get_template_directory_uri()); ?>

<aside class="contents_side">

    <div class="banner_box">
        <a href="<?= esc_url(home_url()); ?>/nextclubonline/about">
            <figure><img src="<?= $uri ?>/assets/img/next_club/bnr_site.png"></figure>
        </a>
    </div>

    <div class="banner_box">
        <a href="<?= esc_url(home_url()); ?>" target="_blank">
            <figure><img src="<?= $uri ?>/assets/img/next_club/bnr_company.png"></figure>
        </a>
    </div>

    <div class="banner_box">
        <a href="<?= esc_url(home_url()); ?>/nextclubonline/newsletter/125455">
            <figure><img src="<?= $uri ?>/assets/img/next_club/bnr_book.png"></figure>
        </a>
    </div>

    <section>
        <div class="ranking_wrapper">
            <h3 class="side_title">人気記事ランキング</h3>
            <div class="ranking_tabs">
                <button class="tab active">DAILY</button>
                <button class="tab">WEEKLY</button>
                <button class="tab">MONTHLY</button>
            </div>

            <div class="ranking_tab_wrapper active">
                <?php
                $daily = array (
                    'range' => 'daily',
                    'limit' => 5,
                    'post_type' => 'nextclubonline, review, interview, gift, trip ,seminar_report,other',
                    'stats_category' => '1',
                    'thumbnail_width' => 80,
                    'thumbnail_height' => 60,
                    'stats_date' => true,
                    'stats_date_format' => 'Y/m/d',
                    'wpp_start' => '<ul class="ranking_list">',
                    'wpp_end' => '</ul>',
                    'post_html' => '<li>
                                        <a href="{url}">
                                            <figure>{thumb_img}</figure>
                                            <div class="ranking_text">
                                                <h4>{text_title}</h4>
                                                <p class="time_icon">{date}</p>
                                            </div>
                                        </a>
                                    </li>',
                );
                ?>
                <?php wpp_get_mostpopular($daily); ?>
            </div>

            <div class="ranking_tab_wrapper">
                <?php
                $weekly = array (
                    'range' => 'weekly',
                    'limit' => 5,
                    'post_type' => 'nextclubonline, review, interview, gift, trip ,seminar_report,other',
                    'stats_category' => '1',
                    'thumbnail_width' => 80,
                    'thumbnail_height' => 60,
                    'stats_date' => true,
                    'stats_date_format' => 'Y/m/d',
                    'wpp_start' => '<ul class="ranking_list">',
                    'wpp_end' => '</ul>',
                    'post_html' => '<li>
                                        <a href="{url}">
                                            <figure>{thumb_img}</figure>
                                            <div class="ranking_text">
                                                <h4>{text_title}</h4>
                                                <p class="time_icon">{date}</p>
                                            </div>
                                        </a>
                                    </li>',
                );
                ?>
                <?php wpp_get_mostpopular($weekly); ?>
            </div>

            <div class="ranking_tab_wrapper">
                <?php
                $monthly = array (
                    'range' => 'monthly',
                    'limit' => 5,
                    'post_type' => 'nextclubonline, review, interview, gift, trip ,seminar_report,other',
                    'stats_category' => '1',
                    'thumbnail_width' => 80,
                    'thumbnail_height' => 60,
                    'stats_date' => true,
                    'stats_date_format' => 'Y/m/d',
                    'wpp_start' => '<ul class="ranking_list">',
                    'wpp_end' => '</ul>',
                    'post_html' => '<li>
                                        <a href="{url}">
                                            <figure>{thumb_img}</figure>
                                            <div class="ranking_text">
                                                <h4>{text_title}</h4>
                                                <p class="time_icon">{date}</p>
                                            </div>
                                        </a>
                                    </li>',
                );
                ?>
                <?php wpp_get_mostpopular($monthly); ?>
            </div>

        </div>
    </section>


    <section>
        <div class="tag_wrapper">
            <h3 class="side_title">記事をカテゴリーから探す</h3>
            <ul class="tag_list">
                <?php
                $categories = get_terms('next_club_category' );
                foreach ($categories as $category) {
                    echo '<li><object><a href="'.esc_url(get_term_link($category)).'">' . $category->name .'</a></object></li>';
                }
                ?>
            </ul>
        </div>
    </section>

    <section>
        <div class="tag_wrapper">
            <h3 class="side_title">記事をタグから探す</h3>
            <ul class="tag_list">
                <?php
                $tags = get_terms('next_club_tag' );
                foreach ($tags as $tag) {
                    echo '<li><object><a href="'.esc_url(get_term_link($tag)).'">' . '#'. $tag->name .'</a></object></li>';
                }
                ?>
            </ul>
        </div>
    </section>


    <section>
        <h3 class="side_title">提携先一覧</h3>
        <?php
        $banners = array(
        // 固定ページの取得
        'posts_per_page' => 10,
        'post_status' => 'publish',
        // カスタム投稿の取得
        'post_type' => 'banner',
        );
        $banner_query = new WP_Query( $banners );
        ?>

        <div class="banner_wrap">
            <?php if ($banner_query->have_posts()): ?>
            <?php while ($banner_query->have_posts()) : $banner_query->the_post(); ?>
            <div class="banner_box">
                <?php $banner_link = SCF::get('banner_link'); ?>
                <a href="<?= esc_url($banner_link); ?>"
                    <?php if(SCF::get('link_to')=== 'new_page'):?>
                        target="_blank"
                    <?php endif; ?>
                >
                    <?php $banner_image = SCF::get('banner_image'); ?>
                    <figure><img src="<?php echo wp_get_attachment_url($banner_image); ?>"></figure>
                    <?php $banner_text = SCF::get('banner_text'); ?>
                    <figcaption><?= esc_html($banner_text); ?></figcaption>
                </a>
            </div>
            <?php endwhile; ?>
            <?php endif;
            wp_reset_postdata();
            ?>
        </div>
        
    </section>


</aside>


