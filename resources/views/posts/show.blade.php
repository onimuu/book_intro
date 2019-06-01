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
          <h1><a class="title" href="/"><i class="fas fa-book-open"></i>BookTalk</a></h1>
        </div>
        <div class="right flex">
          <div><a class="home" href="/home">HOME</a></div>
          <div><a class="my_page" href="/user">
            <img class="header_img" src="data:image/png;base64,{{$user->image}}" alt="">
            {{$user->name}}
          </a></div>
        </div>
      </div>
    </header>
    <main class="main">
      <h2 class="heading">{{ "「" .  $post->title . "」" }}</h2>
      <div class="container">
        <div class="info">
          <p class="book">{{ "『" . $post->book . "』" }}</p>
          <p class="author">{{$post->author}} 著</p>
          <div class="flex">
            <p class="user">{{ $post->user->name }}</p>
            <object>
              <a href="/posts/show/{{$post->id}}/favorite" class="favorite @if($post->favorite_user_identify) favorite_on @endif">
                <i class="fas fa-star @if($post->favorite_user_identify) star_on @endif"></i>×{{$post->favorite}}
              </a>
            </object>
          </div>
        </div>
        <div class="body">
          {!! nl2br($post->body) !!}
        </div>
        @if ($user->id === $post->user_id)
        <div class="btns">
          <a class="btn modify" href="/posts/{{$post->id}}/edit">編集</a>
          <a class="btn delete" href="/posts/{{$post->id}}/del">削除</a>
        </div>
        @endif
        <form action="/posts/{{$post->id}}/comment" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="user_id" value="{{$user->id}}">
          @if ($errors->has('comment'))
          <span class="error">{{$errors->first('comment')}}</span>
          @endif
          <textarea class="textarea-text" name="comment" placeholder="コメント"></textarea>
          <button class="form_btn" type="submit" name="action" value="send">送信</button>
        </form>
        @foreach ($post->comments as $comment)
        <div class="comment_field">
          <div class="profile">
            <img class="user_img" src="data:image/png;base64,{{$user->image}}" alt="">
            <p class="user_name">{{$comment->user->name}}</p>
          </div>
          <div class="triangle"></div>
          <div class="comment">{!! nl2br($comment->body) !!}</div>
        </div>
        @endforeach
      </div>
    </main>
    @component('components.footer')
    @endcomponent


</body>
</html>
