@extends('layouts.main')

@section('title', '個人ページ')

@section('class', 'user')

@section('content')
<h2 class="heading">@if ($user->id == $show_user->id)マイページ @else ユーザーページ @endif</h2>
<div class="container">
  <div class="profile">
    @if ($show_user->image)
    <img class="thumbnail" src="data:image/png;base64,{{$show_user->image}}">
    @else
    <div class="dummy"></div>
    @endif
    <div class="user_name">{{$show_user->name}}</div>
    @if ($user->id == $show_user->id)
    <a class="modify" href="/user/edit">プロフィールを編集する</a>
    @endif
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
        <p class="user">{{ $post->user->name }}</p>
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
