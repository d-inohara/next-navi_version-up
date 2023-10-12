<?php
/*
Template Name: ネクストクラブオンライン新着一覧
*/
?>
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
                <span itemprop="name">新着記事一覧</span>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </div>
</div>


<div class="container_wrap wrap">
    <main role="main">
        <section>
            <h1 class="title_archive">新着記事一覧</h1>
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = array(
                'posts_per_page' => 12,
                'post_status' => 'publish',
                'post_type' => array('nextclubonline', 'review', 'interview', 'gift', 'trip', 'seminar_report', 'other'),
                'paged' => $paged
            );
            $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()) : ?>
                <ul class="news_box_wrapper">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php $post_id = get_the_ID(); ?>
                        <li class="news_box menber_only">
                            <a href="<?php the_permalink(); ?>">
                                <figure>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php else : ?>
                                        <img src="<?= $uri ?>/assets/img/next_club/damy1.png" alt="デフォルト画像" />
                                    <?php endif; ?>
                                    <?php if (get_post_meta($post->ID, 'contents_for', true) === 'member') : ?>
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
                </ul>

                <?php
                if ($the_query->max_num_pages > 1) :
                    $links = paginate_links(array(
                        'type' => 'array',
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => '?paged=%#%',
                        'current' => max(1, $paged),
                        'total' => $the_query->max_num_pages,
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



            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </section>

    </main>

    <?php get_sidebar("nextclubonline"); ?>

</div>

<?php get_footer("nextclubonline"); ?>
