<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>トップページ</title>
</head>
<body>
こんにちは！
@if (Auth::check())
  {{ \Auth::user()->name }}さん
  <a href="/auth/logout">ログアウト</a>
@else
  ゲストさん<br>
  <a href="/auth/login">ログイン</a>
  <a href="/auth/register">会員登録</a>
@endif
</body>
</html>
