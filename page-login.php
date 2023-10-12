<?php
/*
Template Name: ログイン画面用
*/
?>
<?php $uri = esc_url(get_template_directory_uri()); ?>
<?php get_header("nextclubonline"); ?>

<div class="container_wrap wrap">
    <main role="main" class="login_form_wrapper">
        <div class="login_form">
            <?php $error_message = isset($_GET["error_message"]) ? $_GET["error_message"] : false;?>
            <?php if($error_message === 'true'): ?>
                <p class="error_login">ユーザー名、メールアドレス、パスワードに誤りがあります。再入力してください。</p>
            <?php endif; ?>

            <h1 class="title_login">LOGIN</h1>
            <?php the_content(); ?>
            <p class="login_notice">※IDとパスワードは会報誌『LIFE&WALK』に記載されています。</p>
        </div>

    </main>

</div>

<?php get_footer("nextclubonline"); ?>