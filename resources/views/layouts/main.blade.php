<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<link rel="stylesheet" href="/css/reset.css">
<link rel="stylesheet" href="/css/styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="@yield('class')">
    <header class="header">
      <div class="flex">
        <div class="left">
          <h1><a class="title" href="/"><i class="fas fa-book-open"></i>BookTalk</a></h1>
        </div>
        <i class="fas fa-bars menu_btn"></i>
        <div class="right flex">
          <div><a class="post" href="/home">HOME</a></div>
          <div><a class="post" href="/posts/add">新規投稿</a></div>
          <div class="header_user" id="header_user">
            <img class="user_img" src="data:image/png;base64,{{$user->image}}" alt="">
            <p class="user_name">{{$user->name}}</p>
          </div>
          <div class="click_area hidden" id="click_area">
              <a class="my_page" href="/user">マイページ</a>
              <a class="logout" href="/auth/logout">ログアウト</a>
          </div>
        </div>
      </div>
    </header>
    <div class="menu hidden" id="menu">
      <a class="menu_item" href="/home">HOME</a>
      <a class="menu_item" href="/posts/add">新規投稿</a>
      <a class="menu_item" href="/user">マイページ</a>
      <a class="menu_item" href="/auth/logout">ログアウト</a>
    </div>
    <main class="main">
      @yield('content')
    </main>
    <footer class="footer">
      <p>© Book Talk</p>
    </footer>
<script src="/js/script.js"></script>
</body>
</html>
