<?php $uri = esc_url(get_template_directory_uri()); ?>
<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title></title>
    <meta name="Description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" href="<?= $uri ?>/assets/img/common/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/assets/css/next_club.css">
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/assets/css/reset.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
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
        <div class="wrap flex">
            <h1><a href="<?= esc_url(home_url('nextclubonline')); ?>"><img src="<?= $uri ?>/assets/img/next_club/logo.svg" alt="NEXT CLUB Online"></a></h1>
            <div class="header_catch">
                <strong>人生をより豊かにするライフシフト応援サイト</strong>
            </div>
            <div class="header_right">
                <form role="search" method="get" id="searchform" action="<?php echo home_url('nextclubonline');?> ">
                    <button type="submit" value="search" accesskey="f"><img src="<?= $uri ?>/assets/img/next_club/icon_search.png" alt=""></button>
                    <input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="検索キーワードを入力" class="search_input">
                    <input type="hidden" name="post_type[]" value="nextclubonline">
                    <input type="hidden" name="post_type[]" value="review">
                    <input type="hidden" name="post_type[]" value="interview">
                    <input type="hidden" name="post_type[]" value="gift">
                    <input type="hidden" name="post_type[]" value="trip">
                    <input type="hidden" name="post_type[]" value="seminar_report">
                    <input type="hidden" name="post_type[]" value="other">
                </form>
                <?php if(is_user_logged_in() ) : ?>
                    <a href="/?a=logout" class="sign_btn btn_login"><span>ログアウト</span></a>
                <?php else: ?>
                    <a href="<?= esc_url(home_url('nextclubonline/login')); ?>" class="sign_btn btn_logout"><span>ログイン</span></a>
                <?php endif; ?>
            </div>
        </div>
    </header>


    <div class="contents_outer">