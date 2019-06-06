@extends('layouts.main')

@section('title', 'HOME')

@section('class', 'home')

@section('content')
<h2 class="heading">HOME</h2>
<div class="container">
  <div class="genre">
    <form action="/home/genre" method="post">
      {{ csrf_field() }}
      <label for="genre">ジャンル別</label>
      <select class="form_select" name="genre">
        <option value="">選択して下さい</option>
        <option value="literature">文学</option>
        <option value="philosophy">哲学</option>
        <option value="art">芸術</option>
        <option value="religion">宗教</option>
        <option value="study">専門書（学問）</option>
        <option value="technology">専門書（技術・テクノロジー）</option>
        <option value="business">ビジネス・実用書</option>
        <option value="others">その他</option>
      </select>
      <button class="form_btn" type="submit" name="action" value="send">表示</button>
    </form>
  </div>
  <div class="items">
    @foreach ($posts as $post)
    <a class="item" href="/posts/{{$post->id}}">
      <div class="decoration {{$post->genre}}"></div>
      <div class="decoration_inner"></div>
      <div class="title">{{ "「" .  $post->title . "」" }}</div>
      <div class="wrapper">
        <p class="book">{{ "『" . $post->book . "』" }}</p>
        <p class="author">{{ $post->author }} 著</p>
      </div>
      <p class="user">{{ $post->user->name }}</p>
      <object>
        <a href="/posts/{{$post->id}}/favorite" class="favorite @if($post->favorite_user_identify) favorite_on @endif">
          <i class="fas fa-star @if($post->favorite_user_identify) star_on @endif"></i>×{{$post->favorite}}
        </a>
      </object>
    </a>
    @endforeach
  </div>
  {{ $posts->links() }}
</div>
@endsection
