<?php $uri = esc_url(get_template_directory_uri()); ?>


<footer>
    <ul class="footer_link wrap flex">
        <li><a href="<?= esc_url(home_url('nextclubonline')); ?>">ホーム</a></li>
        <li><a href="<?= esc_url(home_url('nextclubonline/about')); ?>">「ネクストクラブONLINE」とは</a></li>
        <li><a href="<?= esc_url(home_url('/company')); ?>" target="_blank">運営者情報</a></li>
        <li><a href="<?= esc_url(home_url('/privacy-policy')); ?>" target="_blank">個人情報保護方針</a></li>
        <li><a href="<?= esc_url(home_url('/contact')); ?>" target="_blank">お問い合わせ</a></li>
        <li><a href="<?= esc_url(home_url()); ?>" target="_blank" class="foot_company_link">Next Navi</a></li>
    </ul>
    <small>© Next Navi Inc.</small>
</footer>

</div>
</div>



<div id="top"><a href="#"><img src="<?= $uri ?>/assets/img/next_club/icon_top.png" alt=""></a></div>


<script src="<?= $uri ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= $uri ?>/assets/js/webfont.js"></script>
<script src="<?= $uri ?>/assets/js/common.js"></script>

<script>

    //ランキングのタブ操作
    $(function() {
        $('.tab').on('click', function() {
            $('.tab, .ranking_tab_wrapper').removeClass('active');

            $(this).addClass('active');

            var index = $('.tab').index(this);
            $('.ranking_tab_wrapper').eq(index).addClass('active');
        });
    });
</script>


<?php wp_footer(); ?>
</body>
</html>