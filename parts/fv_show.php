<div class="fv_bg">
<?php
    $base_args = array(
        'posts_per_page' => 1,
        'post_type' => array('nextclubonline','review','interview','gift','trip', 'seminar_report','other'),
        'meta_key' => 'fv_position',
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $args_1 = $args_2 = $args_3 = $args_4 = $args_5 = $base_args;
    $args_1['meta_value'] = 1;
    $fv1 = new WP_Query($args_1);
    $args_2['meta_value'] = 2;
    $fv2 = new WP_Query($args_2);
    $args_3['meta_value'] = 3;
    $fv3 = new WP_Query($args_3);
    $args_4['meta_value'] = 4;
    $fv4 = new WP_Query($args_4);
    $args_5['meta_value'] = 5;
    $fv5 = new WP_Query($args_5);
    ?>
    <div class="fv_wrapper">
        <ul>
            <li>
                <?php if($fv1->have_posts()): ?>
                    <?php while($fv1->have_posts()) : $fv1->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php if(has_post_thumbnail()): ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                            <div class="fv_bnr_text">
                                <h2>
                                    <?php
                                    if(mb_strlen($post->post_title)>32) {
                                        $title= mb_substr($post->post_title,0,32) ;
                                        echo esc_html($title . '…');
                                    } else {
                                        echo esc_html($post->post_title);
                                    }
                                    ?>
                                </h2>
                            </div>
                        </a>
                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata();?>
            </li>
            <li>
                <?php if($fv2->have_posts()): ?>
                    <?php while($fv2->have_posts()) : $fv2->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php if(has_post_thumbnail()): ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                            <div class="fv_bnr_text">
                                <h2>
                                    <?php
                                    if(mb_strlen($post->post_title)>23) {
                                        $title= mb_substr($post->post_title,0,23) ;
                                        echo esc_html($title . '…');
                                    } else {
                                        echo esc_html($post->post_title);
                                    }
                                    ?>
                                </h2>
                            </div>
                        </a>
                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata();?>
            </li>
            <li>
                <?php if($fv3->have_posts()): ?>
                    <?php while($fv3->have_posts()) : $fv3->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php if(has_post_thumbnail()): ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                            <div class="fv_bnr_text">
                                <h2>
                                    <?php
                                    if(mb_strlen($post->post_title)>23) {
                                        $title= mb_substr($post->post_title,0,23) ;
                                        echo esc_html($title . '…');
                                    } else {
                                        echo esc_html($post->post_title);
                                    }
                                    ?>
                                </h2>
                            </div>
                        </a>
                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata();?>
            </li>
            <li>
                <?php if($fv4->have_posts()): ?>
                    <?php while($fv4->have_posts()) : $fv4->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php if(has_post_thumbnail()): ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                            <div class="fv_bnr_text">
                                <h2>
                                    <?php
                                    if(mb_strlen($post->post_title)>23) {
                                        $title= mb_substr($post->post_title,0,23) ;
                                        echo esc_html($title . '…');
                                    } else {
                                        echo esc_html($post->post_title);
                                    }
                                    ?>
                                </h2>
                            </div>
                        </a>
                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata();?>
            </li>
            <li>
                <?php if($fv5->have_posts()): ?>
                    <?php while($fv5->have_posts()) : $fv5->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php if(has_post_thumbnail()): ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                            <div class="fv_bnr_text">
                                <h2>
                                    <?php
                                    if(mb_strlen($post->post_title)>23) {
                                        $title= mb_substr($post->post_title,0,23) ;
                                        echo esc_html($title . '…');
                                    } else {
                                        echo esc_html($post->post_title);
                                    }
                                    ?>
                                </h2>
                            </div>
                        </a>
                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata();?>
            </li>
        </ul>
    </div>
</div>