@extends('layouts.main')

@section('title', 'マイページ')

@section('class', 'user')

@section('content')
<h2 class="heading">マイページ</h2>
<div class="container">
  <div class="profile">
    @if ($user->image)
      <img class="thumbnail" src="data:image/png;base64,{{$user->image}}">
    @else
      <div class="dummy"></div>
    @endif
    <div class="user_name">{{$user->name}}</div>
    <a class="modify" href="/user/edit">プロフィールを編集する</a>
  </div>
  <div class="my_posts">
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
        <p class="user">{{ $user->name }}</p>
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
</div>
@endsection
