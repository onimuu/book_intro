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
          <h1><a class="title" href="/"><i class="fas fa-book-open"></i>BookTalk</a></h1>
        </div>
        <div class="right flex">
          <div><a class="home" href="/home">HOME</a></div>
          <div><a class="my_page" href="/user">
            <img class="header_img" src="{{ asset('storage/avatar/' . $user->avatar_filename )}}" alt="">
            {{$user->name}}
          </a></div>
        </div>
      </div>
    </header>
    <main class="main">
      <h2 class="heading">投稿編集</h2>
      <div class="container">
        <form action="/posts/edit" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{$post->id}}">
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <div class="box">
            <label for="book">投稿のタイトル</label>
            <span class="error">{{$errors->first('title')}}</span>
            <input class="form_text" type="text" name="title" value="{{$post->title}}">
          </div>
          <div class="box">
            <label for="book">紹介する本</label>
            <input class="form_text" type="text" name="book" value="{{$post->book}}">
            <span class="error">{{$errors->first('book')}}</span>
          </div>
          <div class="box">
            <label for="author">著者</label>
            <input class="form_text" type="text" name="author" value="{{$post->author}}">
            <span class="error">{{$errors->first('author')}}</span>
          </div>
          <div class="box">
            <label for="genre">ジャンル</label>
            <select class="form_select" name="genre">
              <option value="literature" @if($post->genre=='literature') selected @endif)>文学</option>
              <option value="philosophy" @if($post->genre=='philosophy') selected @endif>哲学</option>
              <option value="art" @if($post->genre=='art') selected @endif>芸術</option>
              <option value="religion" @if($post->genre=='religion') selected @endif>宗教</option>
              <option value="study" @if($post->genre=='study') selected @endif>専門書（学問）</option>
              <option value="technology" @if($post->genre=='technology') selected @endif>専門書（技術・テクノロジー）</option>
              <option value="business" @if($post->genre=='business') selected @endif>ビジネス・実用書</option>
              <option value="others" @if($post->genre=='others') selected @endif>その他</option>
            </select>
            <span class="error">{{$errors->first('genre')}}</span>
          </div>
          <div class="box">
            <label for="book">本文(400字以内)</label>
            <textarea class="textarea-text" name="body">{{$post->body}}</textarea>
            <span class="error">{{$errors->first('body')}}</span>
          </div>
          <button class="form_btn" type="submit" name="action" value="send">更新</button>
        </form>
        <a class="go_home" href="/home">ホームへ戻る</a>
      </div>
    </div>
  </main>
  @component('components.footer')
  @endcomponent


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
