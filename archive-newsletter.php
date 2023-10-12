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
                <span itemprop="name">会報誌『LIFE＆WALK』アーカイブ</span>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </div>
</div>


<div class="container_wrap wrap">
    <main role="main">
        <section>

            <h1 class="title_archive">会報誌『LIFE＆WALK』アーカイブ</h1>

            <?php
            $args = array(
                'post_type' => 'newsletter',
                'posts_per_page' => 12,
                'post_status' => 'publish',
            );
            $query = new WP_Query( $args ); // クエリを実行
            ?>

            <ul class="news_box_wrapper">
                <?php if($query->have_posts()): ?>
                    <?php while($query->have_posts()):$query->the_post(); ?>
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
