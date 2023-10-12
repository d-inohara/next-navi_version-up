<?php if(is_user_logged_in() || get_post_meta($post->ID, 'contents_for', true) === 'not_member' ) : ?>
<ul class="single_tag_list">
    <?php
    $tags = get_the_terms($post->ID,'next_club_tag' );
    foreach ($tags as $tag) {
        echo '<li><object><a href="'.esc_url(get_term_link($tag)).'">' . '#'. $tag->name .'</a></object></li>';
    }
    ?>
</ul>
<?php endif; ?>