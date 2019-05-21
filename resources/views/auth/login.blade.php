@component('components.head')
  @slot('title')
  ログイン
  @endslot
@endcomponent
<body>
  @component('components.header')
  @endcomponent
  <div class="login">
    <div class="container">
      <h2>ログイン</h2>
      @isset($message)
      <p style="color:red">{{ $message }}</p>
      @endisset
      <form name="loginform" action="/auth/login" method="post">
        {{ csrf_field() }}
        <div class="wrapper">
          <input class="form_text" type="text" name="email" size="30" placeholder="メールアドレス" value="{{ old('email') }}">
          <span class="error">{{ $errors->first('email')}}</span>
        </div>
        <div class="wrapper">
          <input class="form_text" type="password" name="password" size="30" placeholder="パスワード">
          <span class="error">{{ $errors->first('password')}}</span>
        </div>
        <button class="form_btn" type="submit" name="action" value="send">ログイン</button>
      </form>
    </div>
  </div>
  @component('components.footer')
  @endcomponent
</body>
</html>
