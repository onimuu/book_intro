@component('components.head')
  @slot('title')
  ユーザー
  @endslot
@endcomponent

<body>
  <div class="user">
    <header class="header">
      <div class="flex">
        <div class="left">
          <h1><a class="title" href="/">Book Talk</a></h1>
        </div>
        <div class="right flex">
          <div><a class="login" href="/posts/add">投稿</a></div>
          <div><a class="signup" href="/user">{{$user->name}}</a></div>
        </div>
      </div>
    </header>
    <h2 class="heading">ユーザー</h2>
    <div class="container">
      <div class="profile">
        <div class="user_img"></div>
        <div class="user_name">{{$user->name}}</div>
        <a class="modify" href="#">プロフィールを変更する</a>
      </div>
      <div class="my_posts">
        @foreach ($items as $item)
          <a class="item" href="/posts/{{$item->id}}">
            <p class="book">{{"『" . $item->book . "』" }}</p>
            <p class="title">{{$item->title}}</p>
          </a>
        @endforeach
      </div>
    </div>
  </div>
</body>
</html>
