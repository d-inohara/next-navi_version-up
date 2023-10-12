<?php
/*
Template Name: ネクストクラブオンライン
*/
?>
<?php $uri = esc_url(get_template_directory_uri()); ?>

<?php get_header("nextclubonline"); ?>

<?php get_template_part('parts/fv_show') ?>

		<div class="container_wrap wrap">
			<main role="main">
				<section>
                    <div class="title_wrap">
                        <h2 class="title_news">新着記事</h2>
                        <a href="<?= esc_url(home_url('nextclubonline/news')); ?>" class="more_btn">一覧はこちら</a>
                    </div>
                    <?php
                    $args = array(
                        'posts_per_page' => 6,
                        'post_status' => 'publish',
                        'post_type' => array('nextclubonline','review','interview','gift','trip', 'seminar_report','other'),
                    );
                    query_posts( $args );
                    ?>
                    <?php if (have_posts()): ?>
					<ul class="news_box_wrapper">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php $post_id = get_the_ID(); ?>
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
                        <?php else: ?>
                        <?php
                        endif;
                        wp_reset_query();
                        ?>
					</ul>
				</section>

                <section>
                    <div class="title_wrap">
                        <h2 class="title_news">記事シリーズ</h2>
                        <a href="<?= esc_url(home_url('nextclubonline/series')); ?>" class="more_btn">一覧はこちら</a>
                    </div>
                    <?php
                    $terms = get_terms( array(
                        'taxonomy' => 'next_club_category',
                        'hide_empty' => true,
                    ) );

                    // 投稿が紐づけられたタームのみを抽出
                    $terms_with_posts = array();
                    foreach($terms as $term) {
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
                        <?php
                        $counter = 0;
                        foreach($terms_with_posts as $term_with_post):
                        $term = $term_with_post['term'];
                        ?>
                        <?php if ($counter >= 6) break; ?>
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
                        <?php $counter++; ?>
                        <?php endforeach; ?>
                    </ul>
                </section>

                <section id="archive">
                    <div class="title_wrap">
                        <h2 class="title_video">アーカイブ動画</h2>
                        <a href="<?= esc_url(home_url('nextclubonline/youtube')); ?>" class="more_btn">一覧はこちら</a>
                    </div>
                    <?php
                    $movie_args = array(
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'post_type' => 'youtube',
                    );
                    $movie = new WP_Query($movie_args);
                    ?>
                    <?php if ($movie->have_posts()): ?>
                    <ul class="news_box_wrapper youtube_box_wrapper">
                        <?php while ($movie->have_posts()) : $movie->the_post(); ?>
                            <?php $post_id = get_the_ID(); ?>
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
                        <?php else: ?>
                        <?php
                        endif;
                        wp_reset_postdata();
                        ?>
                    </ul>

                </section>

			</main>

            <?php get_sidebar("nextclubonline"); ?>

        </div>

<?php get_footer("nextclubonline"); ?>
