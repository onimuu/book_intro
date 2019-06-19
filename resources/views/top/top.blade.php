@component('components.head')
  @slot('title')
  BookTalk
  @endslot
@endcomponent

<body>
  <header class="header">
    <div class="flex">
      <div class="left">
        <h1><a class="title" href="/"><i class="fas fa-book-open"></i>BookTalk</a></h1>
      </div>
      <i class="fas fa-bars menu_btn"></i>
      <div class="right flex">
        <div><a class="post" href="auth/login">ログイン</a></div>
        <div><a class="post" href="auth/register">新規登録</a></div>
      </div>
    </div>
  </header>
  <div class="menu hidden" id="menu">
    <a class="menu_item" href="auth/login">ログイン</a>
    <a class="menu_item" href="auth/register">新規登録</a>
  </div>
  <section class="mv">
    <div class="wrapper">
      <h1 class="title">BookTalk</h1>
      <p class="message">好きな本で語ろう。</p>
      <div class="buttons">
        <a class="btn login" href="auth/login">ログイン</a>
        <a class="btn signup" href="auth/register">新規登録</a>
      </div>
    </div>
  </section>
  <section class="section_buttons">
    <a class="btn login" href="auth/login">ログイン</a>
    <a class="btn signup" href="auth/register">新規登録</a>
  </section>
  <section class="explain">
    <h2 class="question">BookTalkとは？</h2>
    <div class="answer">
      <p>好きな本を紹介できる投稿サイト。</p>
      <p>お気に入りの本をシェアしたり、</p>
      <p>みんなの投稿から新たに本を見つけよう。</p>
    </div>
  </section>
  <footer class="footer">
    <p>© Book Talk</p>
  </footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
