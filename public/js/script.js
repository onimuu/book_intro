$(function() {
  'use strict';

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

  // 下書き利用
  $(".use").click(function() {
    var id = $(this).parents('.preserve_item').data('id');
    $.ajax({
      url: '/posts/preserve/use',
      type: 'get',
      dataType: 'json',
      context: this,
      data: {
        id: id
      }
    }).done(function(res) {
      $("#title").val(res.title);
      $("#book").val(res.book);
      $("#author").val(res.author);
      $(`#${res.genre}`).attr("selected", "");
      $("#body").val(res.body);
      $(this).parents(".preserve_item").fadeOut();
      if (res.count === 0) {
        $(".preserve_area").fadeOut();
      }
      $("#count").text(res.count + "件の下書きがありました。");
    });
  });

  // 下書き削除
  $(".delete").click(function() {
    var id = $(this).parents(".preserve_item").data('id');
    $.ajax({
      url: '/posts/preserve/delete',
      type: 'post',
      dataType: 'json',
      context: this,
      data: {
        id: id
      }
    }).done(function(res) {
      $(this).parents(".preserve_item").fadeOut();
      if (res.count === 0) {
        $(".preserve_area").fadeOut();
      }
      $("#count").text(res.count + "件の下書きがありました。");
    });
  });

  // 投稿削除アラート
  $("#delete").click(function() {
    $("#overlay").fadeIn();
    $("#modalWindow").fadeIn();
  });

  $("#no").click(function() {
    $("#overlay").fadeOut();
    $("#modalWindow").fadeOut();
  });
});
