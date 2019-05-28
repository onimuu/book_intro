@component('components.head')
  @slot('title')
  BookTalk
  @endslot
@endcomponent

<body>
  <!-- <header class="header">
    <div class="flex">
      <div class="left">
        <h1><a class="title" href="/">Book Talk</a></h1>
      </div>
      <div class="right flex">
        <a class="login" href="#">ログイン</a>
        <a class="signup" href="#">新規登録</a>
      </div>
    </div>
  </header> -->
  <section class="mv">
    <div class="wrapper">
      <h1 class="title">BookTalk</h1>
      <p class="message">好きな本を語ろう。</p>
      <div class="buttons">
        <a class="btn login" href="auth/login">ログイン</a>
        <a class="btn signup" href="auth/register">会員登録</a>
      </div>
    </div>

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
</body>
</html>
