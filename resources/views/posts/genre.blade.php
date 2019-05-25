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
          <h1><a class="title" href="/">Book Talk</a></h1>
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
    <div class="container">
      <div class="genre">
        <form action="/home/genre" method="post">
          {{ csrf_field() }}
          <label for="genre">ジャンル別</label>
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
          <button class="form_btn_2" type="submit" name="action" value="send">表示</button>
        </form>
      </div>
      <div class="items">
        @foreach ($items as $item)
        <a class="item" href="/posts/{{$item->id}}">
          <div class="decoration {{$item->genre}}"></div>
          <div class="decoration_inner"></div>
          <p class="author">{{ $item->author }} 著</p>
          <p class="book">{{"『" . $item->book . "』" }}</p>
          <p class="title">{{$item->title}}</p>
        </a>
        @endforeach
      </div>
      {{ $items->links() }}
    </div>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
