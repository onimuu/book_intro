@extends('layouts.main')

@section('title', 'プロフィール編集')

@section('class', 'user_edit')

@section('content')
<h2 class="heading">プロフィール編集</h2>
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
@endsection
