@component('components.head')
  @slot('title')
  投稿詳細
  @endslot
@endcomponent

<body>
  <div class="show">
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
    <h2 class="heading">投稿詳細</h2>

</body>
</html>
