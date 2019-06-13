@extends('layouts.main')

@section('title', '新規投稿')

@section('class', 'add')

@section('content')
<h2 class="heading">新規投稿</h2>
<div class="container">
  @if (count($preserves))
  <div class="preserve_area">
    <p id="count">{{count($preserves)}}件の下書きがありました。</p>
    <ul>
    @foreach ($preserves as $preserve)
      <li class="preserve_item" data-id="{{$preserve->id}}">
        {{$preserve->title}}
        <div class="preserve_select"><span class="use">使用する</span><span class="delete">削除する</span></div>
      </li>
    @endforeach
    </ul>
  </div>
  @endif
  <form action="/posts/add" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <div class="box">
      <label for="title">投稿のタイトル</label>
      <input class="form_text" id="title" type="text" name="title" value="{{old('title')}}">
      <span class="error">{{$errors->first('title')}}</span>
    </div>
    <div class="box">
      <label for="book">紹介する本</label>
      <input class="form_text" id="book" type="text" name="book" value="{{old('book')}}">
      <span class="error">{{$errors->first('book')}}</span>
    </div>
    <div class="box">
      <label for="author">著者</label>
      <input class="form_text" id="author" type="text" name="author" value="{{old('author')}}">
      <span class="error">{{$errors->first('author')}}</span>
    </div>
    <div class="box">
      <label for="genre">ジャンル</label>
      <select class="form_select" name="genre">
        <option value="" @if(old('genre')=='') selected @endif>選択して下さい</option>
        <option id="literature" value="literature" @if(old('genre')=='literature') selected @endif>文学</option>
        <option id="philosophy"  value="philosophy" @if(old('genre')=='philosophy') selected @endif>哲学</option>
        <option id="art"  value="art" @if(old('genre')=='art') selected @endif>芸術</option>
        <option id="religion"  value="religion" @if(old('genre')=='religion') selected @endif>宗教</option>
        <option id="study"  value="study" @if(old('genre')=='study') selected @endif>専門書（学問）</option>
        <option id="technology"  value="technology" @if(old('genre')=='technology') selected @endif>専門書（技術・テクノロジー）</option>
        <option id="business"  value="business" @if(old('genre')=='business') selected @endif>ビジネス・実用書</option>
        <option id="others"  value="others" @if(old('genre')=='others') selected @endif>その他</option>
      </select>
      <span class="error">{{$errors->first('genre')}}</span>
    </div>
    <div class="box last">
      <label for="book">本文 (<span id="text_count"></span>)</label>
      <textarea class="textarea-text" id="body" name="body">{{old('body')}}</textarea>
      <span class="error">{{$errors->first('body')}}</span>
    </div>
    <button class="form_btn go" type="submit" name="action" value="send">投稿</button>
    <button class=" form_btn quit save" type="submit" formaction="/posts/preserve">下書きを保存する</button>
  </form>
</div>

@endsection
