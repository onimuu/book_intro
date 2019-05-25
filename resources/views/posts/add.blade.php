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
          <a class="signup" href="/user">{{$user->name}}</a>
        </div>
      </div>
    </header>
    <h2 class="heading">新規作成</h2>
    <div class="container">
      <form action="/posts/add" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <div class="box">
          <label for="title">投稿のタイトル</label>
          <input class="form_text" type="text" name="title" value="{{old('title')}}">
          <span class="error">{{$errors->first('title')}}</span>
        </div>
        <div class="box">
          <label for="book">紹介する本</label>
          <input class="form_text" type="text" name="book" value="{{old('book')}}">
          <span class="error">{{$errors->first('book')}}</span>
        </div>
        <div class="box">
          <label for="author">著者</label>
          <input class="form_text" type="text" name="author" value="{{old('author')}}">
          <span class="error">{{$errors->first('author')}}</span>
        </div>
        <div class="box">
          <label for="genre">ジャンル</label>
          <select class="form_select" name="genre">
            <option value="" @if(old('genre')=='') selected @endif>選択して下さい</option>
            <option value="literature" @if(old('genre')=='literature') selected @endif>文学</option>
            <option value="philosophy" @if(old('genre')=='philosophy') selected @endif>哲学</option>
            <option value="art" @if(old('genre')=='art') selected @endif>芸術</option>
            <option value="religion" @if(old('genre')=='religion') selected @endif>宗教</option>
            <option value="study" @if(old('genre')=='study') selected @endif>専門書（学問）</option>
            <option value="technology" @if(old('genre')=='technology') selected @endif>専門書（技術・テクノロジー）</option>
            <option value="business" @if(old('genre')=='business') selected @endif>ビジネス・実用書</option>
            <option value="others" @if(old('genre')=='others') selected @endif>その他</option>
          </select>
          <span class="error">{{$errors->first('genre')}}</span>
        </div>
        <div class="box">
          <label for="book">本文(400字以内)</label>
          <textarea class="textarea-text" name="body">{{old('body')}}</textarea>
          <span class="error">{{$errors->first('body')}}</span>
        </div>
        <button class="form_btn" type="submit" name="action" value="send">投稿</button>
      </form>
      <a class="go_home" href="/home">ホームへ戻る</a>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
