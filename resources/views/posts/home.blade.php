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
        <div class="right flex">
          <div><a class="post" href="/posts/add">投稿</a></div>
          <div><a class="my_page" href="/user">
            <img class="header_img" src="data:image/png;base64,{{$user->image}}" alt="">
            {{$user->name}}
          </a></div>
          <div class="click_area">
              <a class="my_page" href="#">マイページ</a>
              <a class="logout" href="#">ログアウト</a>
          </div>
        </div>
      </div>
    </header>
    <main class="main">
      <h2 class="heading">投稿一覧</h2>
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
