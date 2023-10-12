<?php $uri = esc_url(get_template_directory_uri()); ?>
<!doctype html>
<html><head>
		<meta charset="utf-8">
		<title></title>
		<meta name="Description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="icon" href="<?= $uri ?>/assets/img/common/favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?= $uri ?>/assets/css/common.css">
		<?php if ( is_home() || is_front_page() ) : ?>
		<link rel="stylesheet" type="text/css" href="<?= $uri ?>/assets/css/swiper-bundle.min.css">
		<link rel="stylesheet" type="text/css" href="<?= $uri ?>/assets/css/mv-slide.css">
        <?php endif; ?>
		<script>console.log("");</script>
		<?php wp_head(); ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P693RR3');</script>
<!-- End Google Tag Manager -->

	
	</head>

	<body <?php body_class(); ?>>
		
		
		
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P693RR3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		
		
		
		
		<div class="site_wrap">

            <?php
            if(is_page("login")){
            } else {
                session_start();
                unset($_SESSION['expage']);
                $_SESSION['expage'] = $_SERVER["REQUEST_URI"];
            }
            ?>


			
			
			<header>
				
				<h1 class="head_logo"><a href="<?= esc_url(home_url()); ?>"><img src="<?= $uri ?>/assets/img/common/logo_contents.png" alt=""></a></h1>
				
				<button class="hbg_btn">
					<span></span>
					<span></span>
					<span></span>
				</button>

				<nav id="slide_menu" class="head_menu">
					<ul>
					    <li class="head_menu_link parent_menu">
							<a href="<?= esc_url(home_url('executive')); ?>">サービス
								<span><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 525 291" xml:space="preserve" enable-background="new 0 0 525 291"><polygon points="262 291 0 46 43 0 262 204 482 0 525 46"/></svg></span>
							</a>
							<ul>
								<li><a href="<?= esc_url(home_url('executive')); ?>"><span>01</span>全ての経営者様へ</a></li>
								<li><a href="<?= esc_url(home_url('completion')); ?>"><span>02</span>会社を譲渡された皆様へ</a></li>
							</ul>
						</li>
						<li class="head_menu_link"><a href="<?= esc_url(home_url('concept')); ?>">経営理念と強み</a></li>
						<li class="head_menu_link"><a href="<?= esc_url(home_url('qa')); ?>">よくある質問</a></li>
						<li class="head_menu_link parent_menu">
							<a href="<?= esc_url(home_url('company')); ?>">会社情報
								<span><svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 525 291" xml:space="preserve" enable-background="new 0 0 525 291"><polygon points="262 291 0 46 43 0 262 204 482 0 525 46"/></svg></span>
							</a>
							<ul>
								<li><a href="<?= esc_url(home_url('company')); ?>"><span>01</span>会社概要</a></li>
								<li><a href="<?= esc_url(home_url('message')); ?>"><span>02</span>代表メッセージ</a></li>
							</ul>
						</li>
                        <li class="haader_nco"><a href="<?= esc_url(home_url('nextclubonline')); ?>" target="_blank"><img src="<?= $uri ?>/assets/img/next_club/logo.svg" alt="NEXT CLUB Online"></a></li>
						<!--<li class="haader_call"><a href="tel:0364395817" class="btns_call"><span>03-6439-5817</span></a></li>-->
						<li class="haader_contact"><a href="<?= esc_url(home_url('contact')); ?>" class="btns_contact"><span>お問い合わせ</span></a></li>
					</ul>
				</nav>
			</header>
			