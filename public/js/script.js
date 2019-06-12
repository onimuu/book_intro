$(function() {
  'use strict';

  {
    // ユーザーメニュー
    $("#header_user").click(function() {
      $("#click_area:not(:animated)").slideToggle("fast");
    });

    // ハンバーガーメニュー
    $(".menu_btn").click(function() {
      $("#menu:not(:animated)").slideToggle(300);
    });


    // いいね機能
    $.ajaxSetup({
      url: '/posts/favorite',
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $(".favorite").click(function() {
      var id = $(this).data('id');
      $.ajax({
        url: '/posts/favorite',
        type: 'post',
        dataType: 'json',
        context: this,
        data: {
          id: id
        }
      }).done(function(res) {
        $(this).children('span').text(res.count);
        if (res.identify) {
          $(this).addClass('favorite_on');
          $(this).children('.fa-star').addClass('star_on');
        } else {
          $(this).removeClass('favorite_on');
          $(this).children('.fa-star').removeClass('star_on');
        }
      });
    });
  }
});
