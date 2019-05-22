@component('components.head')
  @slot('title')
  新規作成
  @endslot
@endcomponent

<body>
  <div class="add">
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
    <h2 class="heading">新規作成</h2>
    <div class="container">
      <form action="/posts/add" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <label for="book">紹介する本</label>
        <input class="form_text" type="text" name="book" value="{{old('book')}}">
        <label for="book">この投稿のタイトル</label>
        <input class="form_text" type="text" name="title" value="{{old('title')}}">
        <label for="book">本文(400字以内)</label>
        <textarea class="textarea-text" name="body"></textarea>
        <button class="form_btn" type="submit" name="action" value="send">投稿</button>
      </form>
      <a class="go_home" href="/home">ホームへ戻る</a>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
