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
          <h1><a class="title" href="/"><i class="fas fa-book-open"></i>BookTalk</a></h1>
        </div>
        <i class="fas fa-bars menu_btn"></i>
        <div class="right flex">
          <div><a class="post" href="/home">HOME</a></div>
          <div><a class="post" href="/posts/add">新規投稿</a></div>
          <div class="header_user" id="header_user">
            <img class="user_img" src="data:image/png;base64,{{$user->image}}" alt="">
            <p class="user_name">{{$user->name}}</p>
          </div>
          <div class="click_area hidden" id="click_area">
              <a class="my_page" href="/user">マイページ</a>
              <a class="logout" href="/auth/logout">ログアウト</a>
          </div>
        </div>
      </div>
    </header>
    <div class="menu hidden" id="menu">
      <a class="menu_item" href="/home">HOME</a>
      <a class="menu_item" href="/posts/add">新規投稿</a>
      <a class="menu_item" href="/user">マイページ</a>
      <a class="menu_item" href="/auth/logout">ログアウト</a>
    </div>
    <main class="main">
      <h2 class="heading">HOME</h2>
      <div class="container">
        <div class="genre">
          <form action="/home/genre" method="post">
            {{ csrf_field() }}
            <label for="genre">ジャンル別</label>
            <select class="form_select" name="genre">
              <option value="">選択して下さい</option>
              <option value="literature">文学</option>
              <option value="philosophy">哲学</option>
              <option value="art">芸術</option>
              <option value="religion">宗教</option>
              <option value="study">専門書（学問）</option>
              <option value="technology">専門書（技術・テクノロジー）</option>
              <option value="business">ビジネス・実用書</option>
              <option value="others">その他</option>
            </select>
            <button class="form_btn" type="submit" name="action" value="send">表示</button>
          </form>
        </div>
        <div class="items">
          @foreach ($items as $item)
          <a class="item" href="/posts/{{$item->id}}">
            <div class="decoration {{$item->genre}}"></div>
            <div class="decoration_inner"></div>
            <div class="title">{{ "「" .  $item->title . "」" }}</div>
            <div class="wrapper">
              <p class="book">{{ "『" . $item->book . "』" }}</p>
              <p class="author">{{ $item->author }} 著</p>
            </div>
            <p class="user">{{ $item->user->name }}</p>
            <object>
              <a href="/posts/{{$item->id}}/favorite" class="favorite @if($item->favorite_user_identify) favorite_on @endif">
                <i class="fas fa-star @if($item->favorite_user_identify) star_on @endif"></i>×{{$item->favorite}}
              </a>
            </object>
          </a>
          @endforeach
        </div>
        {{ $items->links() }}
      </div>
    </div>
  </main>
  @component('components.footer')
  @endcomponent

<script src="/js/script.js"></script>
</body>
</html>
