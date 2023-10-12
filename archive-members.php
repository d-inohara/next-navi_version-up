<?php get_header(); ?>
<?php $uri = esc_url(get_template_directory_uri()); ?>
<section class="bg_gray">
    <div class="bg_blue">
        <div class="contents_title">
            <div class="wrap">
                <div class="contents_title_inner title_child">
                    <h1 class="min">会員限定コンテンツ</h1>
                    <span>Members</span> </div>
            </div>
            <figure class="contents_title_image"><img src="<?= $uri ?>/assets/img/contents/news_main.png" alt=""></figure>
        </div>
    </div>
    <ul class="breadcrumb flex" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <a itemprop="item" href="<?= esc_url(home_url()); ?>"> <span itemprop="name">ネクストナビ</span> </a>
            <meta itemprop="position" content="1" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <span itemprop="name">最新のお知らせ</span>
            <meta itemprop="position" content="2" />
        </li>
    </ul>
    <div class="bg_w">
        <div class="wrap wrap_s contents_wrap">
            <div class="information_wrap archive_information_wrap">
                <div class="information_inner">
                    <ul class="information_text_list">
                        <?php if (have_posts()): ?>
                        <ul class="information_text_list">
                            <?php while (have_posts()) : the_post(); ?>
                                <?php $post_id = get_the_ID(); ?>
                                <li> <a class="information_text_list_link" href="<?php the_permalink(); ?>">
                                        <time class="information_time" datetime="<?php the_time('Y.m.d'); ?>">
                                            <?php the_time('Y.m.d'); ?>
                                        </time>
                                        <?php if(get_post_meta($post->ID,'contents_for',true) === 'member'): ?>
                                            <p class="member_icon">会員限定</p>
                                        <?php endif; ?>
                                        <strong class="information_title">
                                            <?php the_title(); ?>
                                        </strong>
                                        <ul class="information_category">
                                            <?php
                                            $post_terms = get_the_terms( $post_id, 'information_tag' );
                                            if ( is_array( $post_terms ) ) {
                                                foreach ( $post_terms as $tag ) {
                                                    $tag_link = get_term_link( $tag );

                                                    echo '<li><object><a href="' . esc_url( home_url() ) . '/information' . '/' . $tag->slug . '">' . $tag->name . '</a></object></li>';
                                                    ?>
                                                <?php }} ?>
                                        </ul>
                                    </a> </li>
                            <?php endwhile; ?>
                            <?php else: ?>
                            <?php
                            endif;
                            wp_reset_postdata();
                            ?>
                        </ul>
                        <?php the_posts_pagination(
                            array(
                                'mid_size' => '1',
                                'prev_text' => '',
                                'next_text' => '',
                                'screen_reader_text' => ' ',
                            )
                        ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
