// JavaScript Document


// Google font
WebFont.load({
  google: { families: ['Noto+Sans+JP:400,500,700,900'] }
});


/*menu
$(function () {
	$('#openModal').click(function(){
		$('#modalArea').toggleClass('active');
		$('#openModal').toggleClass('open');
		$('body').toggleClass('hidden');
	});
});*/


//scroll
$(function () {
  $('a[href^="#"]').click(function () {
    let speed = 500;
    let href = $(this).attr("href");
    let target = $(href == "#" || href == "" ? 'html' : href);
    let position = target.offset().top - 100;
    $("html, body").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
});

//ハンバーガーメニュー
$(function() {
  $(".hbg_btn").click(function() {
    // cssで背景色を切り替え
    
    $(".head_menu").fadeToggle();
    $(".hbg_btn").toggleClass('open');
  });
});


//ネクストクラブオンライン
const hamburger = $('#js-hamburger');
const nav = $('#js-nav');
const close = $('.hbg_close');
hamburger.on('click', function () {
  hamburger.toggleClass('active');
  nav.toggleClass('active');
  nav.fadeIn();
});



jQuery(function() {
  var top = $('#top');
  top.hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      top.fadeIn();
    } else {
      top.fadeOut();
    }
  });
  top.click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 500);
    return false;
  });
});


$(function() {
  $('.tab').on('click', function() {
    $('.tab, .ranking_tab_wrapper').removeClass('active');

    $(this).addClass('active');

    var index = $('.tab').index(this);
    $('.ranking_tab_wrapper').eq(index).addClass('active');
  });
});

$(function() {
  $(".single_text_wrap p:empty").remove();
  $(".single_text_wrap h1:empty").remove();
  $(".single_text_wrap h2:empty").remove();
  $(".single_text_wrap h3:empty").remove();
  $(".single_text_wrap h4:empty").remove();
  $(".single_text_wrap h5:empty").remove();
  $(".single_text_wrap h6:empty").remove();
});

$(function(){
  $('.single_text_wrap img').each(function() {
    var Width = $(this).width();
    var Height = $(this).height();
    if(Width === 0 && Height === 0){
      $(this).remove();
    }
  })
});

$(function(){
  $('.wp-block-media-text figure img').each(function() {
    var Height = $(this).height();
    if(Height === 0){
      $(this).remove();
    }
  })
});

$(function() {
  $(".single_text_wrap figure:empty").remove();
});

$(function(){
  $('.wp-block-media-text').each(function() {
    var Height = $(this).height();
    if(Height === 0){
      $(this).remove();
    }
  })
});

// $(document).ready(function() {
//   //画像が無い場合にイベント発火
//   $('.single_text_wrap figure img').error(function() {
//     //該当の要素を削除する
//     $(this).remove();
//   });
// });

$(window).on("load", function () {
  var var1 = $('#total-amount-box');
  var var2 = $('#total-amount-box-hidden input').val();
  
  if(var2 === "25,000円"){
    var1.text('25,000円');
  }else if(var2 === "50,000円"){
    var1.text('50,000円');
  }else if(var2 === "75,000円"){
    var1.text('75,000円');
  }else if(var2 === "100,000円"){
    var1.text('100,000円');
  }else if(var2 === "125,000円"){
    var1.text('125,000円');
  }else if(var2 === "150,000円"){
    var1.text('150,000円');
  }else if(var2 === "175,000円"){
    var1.text('175,000円');
  }else if(var2 === "200,000円"){
    var1.text('200,000円');
  }else if(var2 === "225,000円"){
    var1.text('225,000円');
  }else if(var2 === "250,000円"){
    var1.text('250,000円');
  };
});
$(function(){
  $("#people").on("change", function() {
      var val = $(this).val();
      var var1 = $('#total-amount-box');
      var var2 = $('#total-amount-box-hidden input');
      if(val === "1名"){
        var1.text('25,000円');
        var2.val("25,000円"); 
      }else if(val === "2名"){
        var1.text('50,000円');
        var2.val("50,000円"); 
      }else if(val === "3名"){
        var1.text('75,000円');
        var2.val("75,000円"); 
      }else if(val === "4名"){
        var1.text('100,000円');
        var2.val("100,000円"); 
      }else if(val === "5名"){
        var1.text('125,000円');
        var2.val("125,000円"); 
      }else if(val === "6名"){
        var1.text('150,000円');
        var2.val("150,000円"); 
      }else if(val === "7名"){
        var1.text('175,000円');
        var2.val("175,000円"); 
      }else if(val === "8名"){
        var1.text('200,000円');
        var2.val("200,000円"); 
      }else if(val === "9名"){
        var1.text('225,000円');
        var2.val("225,000円"); 
      }else if(val === "10名"){
        var1.text('250,000円');
        var2.val("250,000円"); 
      }else{
        var1.text('0円');
      }

  });

});


