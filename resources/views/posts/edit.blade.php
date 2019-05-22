@component('components.head')
  @slot('title')
  投稿編集
  @endslot
@endcomponent

<body>
  <div class="edit">
    <header class="header">
      <div class="flex">
        <div class="left">
          <h1><a class="title" href="/">Book Talk</a></h1>
        </div>
        <div class="right flex">
          <a class="login" href="/posts/add">投稿</a>
          <a class="signup" href="/user">{{$user->name}}</a>
        </div>
      </div>
    </header>
    <h2 class="heading">投稿編集</h2>
    <div class="container">
      <form action="/posts/edit" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$post->id}}">
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <div class="box">
          <label for="book">紹介する本</label>
          <input class="form_text" type="text" name="book" value="{{$post->book}}">
          <span class="error">{{$errors->first('book')}}</span>
        </div>
        <div class="box">
          <label for="book">この投稿のタイトル</label>
          <span class="error">{{$errors->first('title')}}</span>
          <input class="form_text" type="text" name="title" value="{{$post->title}}">
        </div>
        <div class="box">
          <label for="book">本文(400字以内)</label>
          <textarea class="textarea-text" name="body">{{$post->body}}</textarea>
          <span class="error">{{$errors->first('body')}}</span>          
        </div>
        <button class="form_btn" type="submit" name="action" value="send">更新する</button>
      </form>
      <a class="go_home" href="/home">ホームへ戻る</a>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
