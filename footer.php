<?php $uri = esc_url(get_template_directory_uri()); ?>
<footer class="bg_blue">
				<div class="wrap wrap_ll">
					
					
					<div class="foot_contact_wrap">

						<strong class="foot_contact_title min">CONTACT</strong>
						<p>個別相談も可能です。まずはお気軽にご相談ください。</p>

						<div class="foot_contact_btns">
							<a href="tel:0364395817" class="btns_call">
								<span class="text_main">03-6439-5817</span>
								<span class="text_supp">お電話でのお問合せ：10時～18時<span class="d-inlineblock">（年末年始を除く）</span></span>
							</a>

							<a href="<?= esc_url(home_url('contact')); ?>" class="btns_contact">
								<span class="text_main">お問い合わせ</span>
								<span class="text_supp">メールでのお問合せ：24時間受付</span>
							</a>
						</div>

					</div>
					
					
					<div class="foot_contents">
						<nav>
							<ul class="flex">
								<li><a href="<?= esc_url(home_url()); ?>">HOME</a></li>
								<li><a href="<?= esc_url(home_url('executive')); ?>">サービス</a></li>
								<li><a href="<?= esc_url(home_url('concept')); ?>">経営理念と強み</a></li>
								<li><a href="<?= esc_url(home_url('company')); ?>">会社情報</a></li>
							</ul>
						</nav>
						
						<div class="foot_info">
							<strong>株式会社 ネクストナビ</strong>
							<p>
								〒100-0005 東京都千代田区丸の内一丁目8番2号<br>鉃鋼ビルディング24階
							</p>
							<a href="<?= esc_url(home_url('privacy-policy')); ?>" class="privacy_link">プライバシーポリシー</a>
							<br>
							<a href="<?= esc_url(home_url('site-policy')); ?>" class="privacy_link">本サイトのご利用にあたって</a>
						</div>
						
						<p class="copyright">© Next Navi Inc.</p>
						
					</div>
					
					
					
				</div>
			</footer>




		</div>
	
	
		<script src="<?= $uri ?>/assets/js/jquery-3.5.1.min.js"></script>
		<script src="<?= $uri ?>/assets/js/webfont.js"></script>
		<?php if ( is_home() || is_front_page() ) : ?>
		<script src="<?= $uri ?>/assets/js/swiper-bundle.min.js"></script>
		<script src="<?= $uri ?>/assets/js/mv-slide.js"></script>
		<?php endif; ?>
		<script src="<?= $uri ?>/assets/js/common.js"></script>
		<script src="<?= $uri ?>/assets/js/ajaxzip3.js"></script>

	
		<script>
			$(window).scroll(function () {
				if($(window).scrollTop() > 20) {
					$('.head_menu').addClass('head_scroll');
				} else {
					$('.head_menu').removeClass('head_scroll');
				}
			});
			
			
			$(".faq_answer");
			$(".faq_question").on("click", function() {
				$(this).next().slideToggle();
				$(this).toggleClass("active");
			});


			//郵便番号から住所を自動入力
			$('.ajaxzip3').on('click', function(){
				AjaxZip3.zip2addr('zip1','zip2','address1','address2');

				AjaxZip3.onSuccess = function() {
					$('.address2').focus();
				};

				AjaxZip3.onFailure = function() {
					alert('該当する住所が見つかりません');
				};
				
				return false;
			});

			//セレクトボックスの表示調整
			jQuery( function( $ ) {
				$( ' .mw_wp_form_input select option[value=""]' )
					.html( '選択してください' );
			} );

			
			<?php if ( is_home() || is_front_page() ) : ?>
			$(function() {
				$('.select_btn li').click(function() {
					var index = $('.select_btn li').index(this);
					$('.select_content .select_content_box').css('display','none');
					$('.select_content .select_content_box').eq(index).css('display','block');
					$('.select_btn li').removeClass('select');
					$(this).addClass('select')
				});
			});
			<?php endif; ?>
			
		</script>
		
		
		<?php wp_footer(); ?>
	</body>
</html>