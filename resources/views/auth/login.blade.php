<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ログイン</title>
<link rel="stylesheet" href="/css/reset.css">
<link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header class="header">
    <div class="flex">
      <div class="left">
        <h1><a class="title" href="/">Book Talk</a></h1>
      </div>
      <div class="right flex">
        <a class="login" href="#">ログイン</a>
        <a class="signup" href="#">新規登録</a>
      </div>
    </div>
  </header>
  <section class="login">
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
  </section>
</body>
</html>
