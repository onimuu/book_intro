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
      <a class="item" href="/posts/{{$post->id}}">
        <div class="decoration {{$post->genre}}"></div>
        <div class="decoration_inner"></div>
        <p class="title">{{ "「" .  $post->title . "」" }}</p>
        <div class="wrapper">
          <p class="book">{{ "『" . $post->book . "』" }}</p>
          <p class="author">{{ $post->author }} 著</p>
        </div>
        <p class="user">{{ $user->name }}</p>
        <object>
          <a href="/user/{{$post->id}}/favorite" class="favorite @if($post->favorite_user_identify) favorite_on @endif">
            <i class="fas fa-star @if($post->favorite_user_identify) star_on @endif"></i>×{{$post->favorite}}
          </a>
        </object>
      </a>
      @endforeach
    </div>
    {{ $posts->links() }}
  </div>
</div>
@endsection
