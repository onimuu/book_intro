採用担当者様

テストユーザーログイン機能を用意しておりますので、ご利用いただければと思います。


# 本紹介アプリ
好きな本を紹介できる投稿アプリです。
お気に入りの本をシェアしたり、他の投稿から新たに面白そうな本を探すことができます。

http://ec2-52-192-6-71.ap-northeast-1.compute.amazonaws.com/

## 機能一覧

**ユーザー関連**
* ユーザー登録(Auth)
* ログイン/ログアウト(Auth)
* Twitterログイン(Socialite)
* プロフィール画像アップロード
* 登録情報変更

**投稿関連**
* 投稿/削除
* 下書き保存(Ajax)
* 投稿一覧
* ジャンル別表示
* ページネーション
* お気に入り(Ajax)
* コメント投稿

## 使用技術
**AWS**
* EC2
* RDS(mysql)
* VPS

**言語・フレームワーク**
* PHP 7.3.5
* Laravel 5.8.26
* jQuery 2.2.4


## こだわったポイント
* ジャンル毎にテーマカラーをつけて本の左上に対応色のリボンをつけました。その結果、ジャンル毎に表示するとリボンの色が揃うようになっています。
* Ajaxを使用することで、特にコメント機能でスムーズな使用感を実現しています。
