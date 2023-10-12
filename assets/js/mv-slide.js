(function() {
  'use strict';


	/* intro-slide
	------------------------------*/
	var intro = (function () {
		
		$('.intro-start').removeClass('close');

		var
			slideTotal = 0,
			slideIsEnd = false,
			timer = false,
			swiper = new Swiper('.home-intro_slide .swiper', {
			effect: 'fade',
			fadeEffect: {
				crossFade: true,
			},
			loop: false,
			loopAdditionalSlides: 1,
			speed: 1000,
			autoplay: {
				delay: 1500,
				disableOnInteraction: false,
				stopOnLastSlide: true,
				waitForTransition: false,
			},
			on: {
				init: function(e) {
					// スライド総数を取得
					slideTotal = e.slides.length;
				},
				activeIndexChange: function(e) {
					clearTimeout(timer);

					// スライド終端への移動判定
					slideIsEnd = e.isEnd;

					// 終端の場合、一定時間経過後に次に移動
					if (slideIsEnd) {
						timer = setTimeout(onClode, 5000);
					}
				},
			}
		});

		/* skip
		------------------------------*/
		$('#skip_01').on('click', function () {
			if (!slideIsEnd) {
				swiper.slideTo(slideTotal - 1);
			} else {
				onClode();
			}
		});

		function onClode() {
			home();
		}
	});


/* home-mv
------------------------------*/

	var home = (function() {
		const myDelay = 6000;
		let timer;

		
		$('.intro-start').addClass('close');
		

		/* 全体指定 */
		const switchAnimation = () => {
			clearTimeout(timer);
			let activeSlide = document.querySelectorAll('.home-mv .swiper-slide[class*=-active]');
			for (let i = 0; i < activeSlide.length; i++) {
				activeSlide[i].classList.remove('anm-finished');
				activeSlide[i].classList.add('anm-started');
			}
			timer =  setTimeout(() => {
				for (let i = 0; i < activeSlide.length; i++) {
					activeSlide[i].classList.remove('anm-started');
					activeSlide[i].classList.add('anm-finished');
				}
			}, myDelay - 1000);
		}

		const finishAnimation = () => {
			let activeSlide = document.querySelectorAll('.home-mv .swiper-slide.anm-started');
			for (let i = 0; i < activeSlide.length; i++) {
				activeSlide[i].classList.remove('anm-started');
				activeSlide[i].classList.add('anm-finished');
			}
		}


		/* Swiper 指定 */
		const mySwiper = new Swiper('.home-mv .swiper', {
			effect: 'fade',
			fadeEffect: {
				crossFade: true,
			},
			loop: true,
			loopAdditionalSlides: 1,
			speed: 2000,
			autoplay: {
				delay:myDelay,
				disableOnInteraction: false,
				waitForTransition: false,
			},
			followFinger: false,
			on: {
				slideChange: () => {
					finishAnimation();
				},
				slideChangeTransitionStart: () => {
					switchAnimation();
				},
			}
		});
	});

	var
		cookies = document.cookie.split(/; */);

	for (var i = 0; i < cookies.length; i++) {
		var cookie = cookies[i].split('=');

		if (cookie[0] === 'intro-played') {
			home();
			return;
		}
	}

	intro();
	document.cookie = 'intro-played=1; max-age=31536000';
})();
