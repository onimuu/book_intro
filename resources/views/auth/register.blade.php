@component('components.head')
  @slot('title')
  新規登録
  @endslot
@endcomponent
<body>
  @component('components.header')
  @endcomponent
  <!-- <header class="header">
    <div class="flex">
      <div class="left">
        <h1><a class="title" href="/">Book Talk</a></h1>
      </div>
      <div class="right flex">
        <a class="login" href="#">ログイン</a>
        <a class="signup" href="#">新規登録</a>
      </div>
    </div>
  </header> -->
  <div class="register">
    <div class="container">
      <h2>新規登録</h2>
      <form name="registform" action="/auth/register"method="post">
        {{ csrf_field() }}
        <div class="wrapper">
          <input class="form_text" type="text" name="name"size="30" placeholder="名前">
          <span class="error">{{ $errors->first('name') }}</span>
        </div>
        <div class="wrapper">
          <input class="form_text" type="text" name="email" size="30" placeholder="メールアドレス">
          <span class="error">{{ $errors->first('email')}}</span>
        </div>
        <div class="wrapper">
          <input class="form_text" type="password" name="password" size="30" placeholder="パスワード">
          <span class="error">{{ $errors->first('password')}}</span>
        </div>
        <div class="wrapper">
          <input class="form_text" type="password" name="password_confirmation" size="30" placeholder="パスワード（確認）">
          <span class="error">{{ $errors->first('password_confirmation')}}</span>
        </div>
        <button class="form_btn type="submit" name="action" value="send">送信</button>
      </form>
    </div>
  </div>
  @component('components.footer')
  @endcomponent
</body>
</html>
