@component('components.head')
  @slot('title')
  登録情報変更
  @endslot
@endcomponent

<body>
  <div class="user_edit">
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
      <h2 class="heading">登録情報変更</h2>
      <div class="container">
        <form action="/user/edit" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="box first">
            <label class="label">プロフィール画像</label>
            @if ($user->image)
              <img class="thumbnail" src="data:image/png;base64,{{$user->image}}">
            @else
              <span class="dummy"></span>
            @endif
            <input class="form_file" type="file" name="photo">
            @if ($errors->any())
              <span class="error first">{{ $errors->first('photo') }}</span>
            @endif
          </div>
          <div class="box">
            <label class="label" for="name">ユーザー名</label>
            <input class="form_text" type="text" name="name" size="30" value="{{$user->name}}">
            <span class="error">{{ $errors->first('name') }}</span>
          </div>
          <div class="box">
            <label class="label" for="email">メールアドレス</label>
            <input class="form_text" type="text" name="email" size="30" value="{{$user->email}}">
            <span class="error">{{ $errors->first('email')}}</span>
          </div>
          <button class="form_btn type="submit" name="action" value="send">送信</button>
        </form>
      </div>
    </div>
  </main>
  @component('components.footer')
  @endcomponent

</body>
</html>
