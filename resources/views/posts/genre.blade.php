@extends('layouts.main')

@section('title', 'ジャンル別表示')

@section('class', 'genre')

@section('content')
<h2 class="heading">ジャンル別表示</h2>
<div class="container">
  <div class="genre">
    <form action="/home/genre" method="post">
      {{ csrf_field() }}
      <label for="genre">ジャンル別</label>
      <select class="form_select" name="genre">
        <option value="literature" @if($post_genre=='literature') selected @endif>文学</option>
        <option value="philosophy" @if($post_genre=='philosophy') selected @endif>哲学</option>
        <option value="art" @if($post_genre=='art') selected @endif>芸術</option>
        <option value="religion" @if($post_genre=='religion') selected @endif>宗教</option>
        <option value="study" @if($post_genre=='study') selected @endif>専門書（学問）</option>
        <option value="technology" @if($post_genre=='technology') selected @endif>専門書（技術・テクノロジー）</option>
        <option value="business" @if($post_genre=='business') selected @endif>ビジネス・実用書</option>
        <option value="others" @if($post_genre=='others') selected @endif>その他</option>
      </select>
      <button class="form_btn type="submit" name="action" value="send">表示</button>
    </form>
  </div>
  <div class="items">
    @foreach ($posts as $post)
    <div class="item">
      <div class="decoration {{$post->genre}}"></div>
      <div class="decoration_inner"></div>
      <a href="/posts/{{$post->id}}" class="title">{{ "「" .  $post->title . "」" }}</a>
      <a href="/posts/{{$post->id}}" class="wrapper">
        <p class="book">{{ "『" . $post->book . "』" }}</p>
        <p class="author">{{ $post->author }} 著</p>
      </a>
      <a href="/user/{{$post->user->id}}" class="user">{{ $post->user->name }}</a>
      <object>
        <div data-id="{{$post->id}}" class="favorite @if($post->favorite_user_identify) favorite_on @endif">
          <i class="fas fa-star @if($post->favorite_user_identify) star_on @endif"></i>×<span class="count">{{$post->favorite}}</span>
        </div>
      </object>
    </div>
    @endforeach
  </div>
  {{ $posts->links() }}
</div>
@endsection
