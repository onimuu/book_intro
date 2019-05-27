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
          <a class="signup" href="/user">{{$user->name}}</a>
        </div>
      </div>
    </header>
    <h2 class="heading">{{ "「" .  $post->title . "」" }}</h2>
    <div class="container">
      <div class="info">
        <p class="book">{{ "『" . $post->book . "』" }}</p>
        <p class="author">{{$post->author}} 著</p>
        <p class="user">{{ $post->user_name }}</p>
        <object>
          <a href="/posts/show/{{$post->id}}/favorite" class="favorite @if($post->favorite_user_identify) favorite_on @endif">
            <i class="fas fa-star @if($post->favorite_user_identify) star_on @endif"></i>×{{$post->favorite}}
          </a>
        </object>
      </div>

      <div class="body">
        {{$post->body}}
      </div>
      @if ($user->id === $post->user_id)
      <a class="modify" href="/posts/{{$post->id}}/edit">編集する</a>
      <a class="delete" href="/posts/{{$post->id}}/del">削除する</a>
      @endif
      <a class="go_home" href="/home">ホームへ戻る</a>
    </div>

</body>
</html>
