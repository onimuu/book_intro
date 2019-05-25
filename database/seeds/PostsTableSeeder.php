<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'user_id' => '1',
          'book' => '西洋哲学史',
          'title' => '哲学入門にうってつけ',
          'body' => 'わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。',
          'author' => 'シュヴェーグラー',
          'genre' => 'philosophy',
        ];
        DB::table('posts')->insert($param);

        $param = [
          'user_id' => '1',
          'book' => '東洋的な見方',
          'title' => '現代日本にはないもう一つの世界の見方',
          'body' => '素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。',
          'author' => '鈴木大拙',
          'genre' => 'religion',
    ];
        DB::table('posts')->insert($param);

        $param = [
          'user_id' => '1',
          'book' => '統計学は最強の学問である',
          'title' => '統計学の面白さ',
          'body' => '前半は統計学有用さを興味深いエピソードで紹介する。後半は教科書とは違う見方で色々な概念を説明しており、多面的な理解に大いに役立つ。',
          'author' => 'シュヴェーグラー',
          'genre' => 'study',
        ];
        DB::table('posts')->insert($param);

        $param = [
          'user_id' => '2',
          'book' => '日日是好日',
          'title' => '茶道を始めたくなる本',
          'body' => '茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。',
          'author' => '森下典子',
          'genre' => 'literature',
        ];
        DB::table('posts')->insert($param);

    }
}
