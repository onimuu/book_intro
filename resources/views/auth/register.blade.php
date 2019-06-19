@component('components.head')
  @slot('title')
  新規登録
  @endslot
@endcomponent
<body>
  @component('components.header')
  @endcomponent
  <div class="register">
    <div class="container">
      <h2>新規登録</h2>
      <a class="test" href="/auth/login/test" class="" >
        テストユーザーでログイン
      </a>
      <form name="registform" action="/auth/register"method="post">
        {{ csrf_field() }}
        <div class="box">
          <input class="form_text" type="text" name="name"size="30" placeholder="ユーザー名" value="{{old('name')}}">
          <span class="error">{{ $errors->first('name') }}</span>
        </div>
        <div class="box">
          <input class="form_text" type="text" name="email" size="30" placeholder="メールアドレス" value="{{old('email')}}">
          <span class="error">{{ $errors->first('email')}}</span>
        </div>
        <div class="box">
          <input class="form_text" type="password" name="password" size="30" placeholder="パスワード">
          <span class="error">{{ $errors->first('password')}}</span>
        </div>
        <div class="box">
          <input class="form_text" type="password" name="password_confirmation" size="30" placeholder="パスワード（確認）">
          <span class="error">{{ $errors->first('password_confirmation')}}</span>
        </div>
        <button class="form_btn type="submit" name="action" value="send">登録</button>
      </form>
      <a class="twitter" href="/login/twitter"><i class="fab fa-twitter"></i>twitterで登録</a>
    </div>
  </div>
  @component('components.footer')
  @endcomponent
</body>
</html>
