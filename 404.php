
<?php $uri = esc_url(get_template_directory_uri()); ?>
<?php get_header("nextclubonline"); ?>
	<div class="container_wrap wrap">
		<main role="main">
			<h1>404 Page Not Found</h1>
			<p style="margin: 20px 0">お探しのページは見つかりませんでした。</p>
			<div class="search_box">
				<input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="検索キーワードを入力" class="search_input">
				<input type="hidden" name="post_type" value="nextclubonline">
				<button type="submit" class="search_btn" value="search" accesskey="f">
					<span class="search_btn_icon"><img src="<?= $uri ?>/assets/img/next_club/icon_search.png" alt=""></span>
					<span class="search_btn_text">検索</span>
				</button>
			</div>
		</main>
	</div>
<?php get_footer("nextclubonline"); ?>