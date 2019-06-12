$(function() {
  'use strict';

  {
    // ユーザーメニュー
    $("#header_user").click(function() {
      $("#click_area").slideToggle("fast");
    });

    // ハンバーガーメニュー
    $(".menu_btn").click(function() {
      $("#menu").slideToggle(300);
    });
  }
});
