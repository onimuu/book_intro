@component('components.head')
  @slot('title')
  ジャンル別表示
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
          <div><a class="login" href="/posts/add">投稿</a></div>
          <div><a class="signup" href="/user">{{$user->name}}</a></div>
          <div><a class="logout" href="/auth/logout">ログアウト</a></div>
          <div class="click_area">
              <a class="my_page" href="#">マイページ</a>
              <a class="logout" href="#">ログアウト</a>
          </div>
        </div>
      </div>
    </header>
    <h2 class="heading">ジャンル別表示</h2>
    <main class="main">
      <div class="container">
        <div class="genre">
          <form action="/home/genre" method="post">
            {{ csrf_field() }}
            <label for="genre">ジャンル別</label>
            <select class="form_select" name="genre">
              <option value="literature" @if($item_genre=='literature') selected @endif>文学</option>
              <option value="philosophy" @if($item_genre=='philosophy') selected @endif>哲学</option>
              <option value="art" @if($item_genre=='art') selected @endif>芸術</option>
              <option value="religion" @if($item_genre=='religion') selected @endif>宗教</option>
              <option value="study" @if($item_genre=='study') selected @endif>専門書（学問）</option>
              <option value="technology" @if($item_genre=='technology') selected @endif>専門書（技術・テクノロジー）</option>
              <option value="business" @if($item_genre=='business') selected @endif>ビジネス・実用書</option>
              <option value="others" @if($item_genre=='others') selected @endif>その他</option>
            </select>
            <button class="form_btn_2" type="submit" name="action" value="send">表示</button>
          </form>
        </div>
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
              <a href="/posts/genre/{{$item->id}}/{{$item_genre}}/favorite" class="favorite @if($item->favorite_user_identify) favorite_on @endif">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
