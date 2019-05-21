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
          <a class="login" href="/posts/add">投稿</a>
          <a class="signup" href="#">マイページ</a>
        </div>
      </div>
    </header>
    <h2 class="heading">投稿一覧</h2>
    <div class="container">
      @foreach ($items as $item)
        <a class="item" href="#">
          <p class="book">{{"『" . $item->book . "』" }}</p>
          <p class="title">{{$item->title}}</p>
        </a>
      @endforeach
    </div>
  </div>



</body>
</html>
