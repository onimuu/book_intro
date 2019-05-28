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
          <h1><a class="title" href="/"><i class="fas fa-book-open"></i>BookTalk</a></h1>
        </div>
        <div class="right flex">
          <div><a class="login" href="/posts/add">投稿</a></div>
          <div><a class="signup" href="/user">{{$user->name}}</a></div>
          <div><a class="logout" href="/auth/logout">ログアウト</a></div>
        </div>
      </div>
    </header>
    <main class="main">
      <h2 class="heading">マイページ</h2>
      <div class="container">
        <div class="profile">
          @if ($user->avatar_filename)
            <img class="thumbnail" src="{{ asset('storage/avatar/' . $user->avatar_filename )}}">
          @else
            <div class="dummy"></div>
          @endif
          <div class="user_name">{{$user->name}}</div>
          <a class="modify" href="/user/edit">プロフィールを編集する</a>
        </div>
        <div class="my_posts">
          <div class="items">
            @foreach ($items as $item)
            <a class="item" href="/posts/{{$item->id}}">
              <div class="decoration {{$item->genre}}"></div>
              <div class="decoration_inner"></div>
              <p class="title">{{ "「" .  $item->title . "」" }}</p>
              <div class="wrapper">
                <p class="book">{{ "『" . $item->book . "』" }}</p>
                <p class="author">{{ $item->author }} 著</p>
              </div>
              <p class="user">{{ $user->name }}</p>
              <object>
                <a href="/user/{{$item->id}}/favorite" class="favorite @if($item->favorite_user_identify) favorite_on @endif">
                  <i class="fas fa-star @if($item->favorite_user_identify) star_on @endif"></i>×{{$item->favorite}}
                </a>
              </object>
            </a>
            @endforeach
          </div>
          {{ $items->links() }}
        </div>
      </div>
    </div>
  </main>
</body>
</html>
