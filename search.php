<?php $uri = esc_url(get_template_directory_uri()); ?>

<?php get_header("nextclubonline"); ?>

<?php
global $wp_query;
$total_results = $wp_query->found_posts;
$search_query = get_search_query();
?>

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
                <span itemprop="name">「<?php echo $search_query; ?>」の検索結果</span>
                <meta itemprop="position" content="2" />
            </li>

        </ul>
    </div>
</div>

<div class="container_wrap wrap">
    <main role="main">
        <section>

            <h1 class="title_archive">「<?php echo $search_query; ?>」の検索結果<span class="title_sub">/<?php echo $total_results; ?>件</span></h1>

            <form role="search" method="get" id="searchform" action="<?php echo home_url('/');?> ">
                <div class="search_box">
                    <input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="検索キーワードを入力" class="search_input">
                    <input type="hidden" name="post_type[]" value="nextclubonline">
                    <input type="hidden" name="post_type[]" value="review">
                    <input type="hidden" name="post_type[]" value="interview">
                    <input type="hidden" name="post_type[]" value="gift">
                    <input type="hidden" name="post_type[]" value="trip">
                    <input type="hidden" name="post_type[]" value="seminar_report">
                    <input type="hidden" name="post_type[]" value="other">
                    <button type="submit" class="search_btn" value="search" accesskey="f">
                        <span class="search_btn_icon"><img src="<?= $uri ?>/assets/img/next_club/icon_search.png" alt=""></span>
                        <span class="search_btn_text">検索</span>
                    </button>
                </div>
            </form>

            <?php if( $total_results > 0 ): ?>
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
                <?php endif;?>
            </ul>
            <?php wp_reset_postdata(); ?>

            <?php else: ?>
                <div id="result-list">
                    <p><?php echo $search_query; ?> に一致する記事は見つかりませんでした。</p>
              　</div>

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

