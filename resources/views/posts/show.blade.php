@extends('layouts.main')

@section('title', '投稿詳細')

@section('class', 'show')

@section('content')
<h2 class="heading">{{ "「" .  $post->title . "」" }}</h2>
<div class="container">
  <div class="info">
    <p class="book">{{ "『" . $post->book . "』" }}</p>
    <p class="author">{{$post->author}} 著</p>
    <div class="flex">
      <p class="user">{{ $post->user->name }}</p>
      <object>
        <div data-id="{{$post->id}}" class="favorite @if($post->favorite_user_identify) favorite_on @endif">
          <i class="fas fa-star @if($post->favorite_user_identify) star_on @endif"></i>×<span class="count">{{$post->favorite}}</span>
        </div>
      </object>
    </div>
  </div>
  <div class="body">
    {!! nl2br($post->body) !!}
  </div>
  @if ($user->id === $post->user_id)
    <div class="btns">
      <a class="btn modify" href="/posts/{{$post->id}}/edit">編集</a>
      <div class="btn delete" id="delete">削除</div>
    </div>
  @endif
  <form action="/posts/{{$post->id}}/comment" method="post" class="comment_form">
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{$user->id}}">
    @if ($errors->has('comment'))
    <span class="error">{{$errors->first('comment')}}</span>
    @endif
    <textarea class="textarea-text" name="comment" placeholder="コメント"></textarea>
    <button class="form_btn" type="submit" name="action" value="send">送信</button>
  </form>
  @foreach ($post->comments as $comment)
  <div class="comment_field">
    <div class="profile">
      <img class="user_img" src="data:image/png;base64,{{$user->image}}" alt="">
      <p class="user_name">{{$comment->user->name}}</p>
    </div>
    <div class="triangle"></div>
    <div class="comment">{!! nl2br($comment->body) !!}</div>
  </div>
  @endforeach
</div>
<div id="overlay"></div>
<div id="modalWindow">
  <p class="confirm">本当に削除しますか？</p>
  <div class="btns">
    <div class="btn no" id="no">いいえ</div>
    <a class="btn yes" href="/posts/{{$post->id}}/del">はい</a>
  </div>
</div>


@endsection
