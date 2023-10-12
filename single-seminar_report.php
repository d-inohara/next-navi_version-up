<?php get_header("nextclubonline"); ?>

    <div class="breadcrumb_wrap">
        <div class="inner wrap">
            <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                <?php
                $cat = get_the_terms($post->ID, "next_club_category");
                $cat = $cat[0];
                ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="<?= esc_url(home_url('nextclubonline')); ?>">
                        <span itemprop="name">HOME</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>

                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="<?= esc_url(home_url('nextclubonline')).'/'.'category'.'/'.$cat->slug ;?>">
                        <span itemprop="name"><?= esc_html($cat->name); ?></span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>

                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name"><?php the_title(); ?></span>
                    <meta itemprop="position" content="3" />
                </li>

            </ul>
        </div>
    </div>

    <div class="container_wrap wrap">
        <main role="main" class="single_main">
            <article>

                <div class="single_title_wrap">
                    <time datetime="<?php the_time('Y.m.d'); ?>" class="time_icon"><?php the_time('Y.m.d'); ?></time>
                    <h1 class="single_title"><?php the_title(); ?></h1>
                    <p class="category">
                        <?php
                        $cat = get_the_terms($post->ID, "next_club_category");
                        $cat = $cat[0];
                        echo '<a href="'.esc_url(get_term_link($cat)).'">' . esc_html($cat->name) .'</a>';
                        ?>
                    </p>
                </div>



                <div class="single_text_wrap">
                    <?php if(is_user_logged_in() || get_post_meta($post->ID, 'contents_for', true) === 'not_member' ) : ?>
                        <?php echo the_content(); ?>
                    <?php else : ?>
                        <div class="need_login_next">
                            <h1>この記事はNEXT CLUB Online <span>会員限定です。</span></h1>
                            <p>閲覧にはログインが必要です。</p>
                            <a href="<?= esc_url(home_url('nextclubonline/login')); ?>" class="sign_btn btn_logout"><span>ログインページはこちら</span></a>
                        </div>
                    <?php endif; ?>

                    <?php get_template_part('parts/single_tag_list') ?>
                </div>

            </article>

            <?php get_template_part('parts/back_archive_button') ?>

        </main>

        <?php get_sidebar("nextclubonline"); ?>

    </div>




<?php get_footer("nextclubonline"); ?>