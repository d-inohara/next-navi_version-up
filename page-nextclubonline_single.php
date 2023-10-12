<?php
/*
Template Name: ネクストクラブオンライン固定ページ
*/
?>
<?php $uri = esc_url(get_template_directory_uri()); ?>

<?php get_header("nextclubonline"); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php remove_filter('the_content', 'wpautop'); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>

<?php get_footer("nextclubonline"); ?>
