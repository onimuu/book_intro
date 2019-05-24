@component('components.head')
  @slot('title')
  投稿一覧
  @endslot
@endcomponent
<body>
  <div class="home">
    <header class="header">
      <div class="flex">
        <div class="left">
          <h1><a class="title" href="/">Book Talk</a></h1>
        </div>
        <div class="right flex">
          <div><a class="login" href="/posts/add">投稿</a></div>
          <div><a class="signup" href="/user">{{$user->name}}</a></div>
          <div><a class="logout" href="/auth/logout">ログアウト</a></div>
          <div class="click_area">
              <a class="my_page" href="#">マイページ</a>
              <a class="logout" href="#">ログアウト</a>
          </div>
        </div>
      </div>
    </header>
    <h2 class="heading">投稿一覧</h2>
    <div class="container">
      <div class="items">
        @foreach ($items as $item)
        <a class="item" href="/posts/{{$item->id}}">
          <p class="book">{{"『" . $item->book . "』" }}</p>
          <p class="title">{{$item->title}}</p>
        </a>
        @endforeach
      </div>
      {{ $items->links() }}
    </div>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
