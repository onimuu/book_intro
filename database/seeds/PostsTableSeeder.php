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
          'title' => '哲学の奥深さ',
          'body' => 'わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。わかりやすい名著。',
        ];
        DB::table('posts')->insert($param);

        $param = [
          'user_id' => '1',
          'book' => '東洋的な見方',
          'title' => '私のバイブル',
          'body' => '素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。素晴らしい。',
        ];
        DB::table('posts')->insert($param);

        $param = [
          'user_id' => '1',
          'book' => '統計学は最強の学問である',
          'title' => '統計学の面白さ',
          'body' => '前半は統計学有用さを興味深いエピソードで紹介する。後半は教科書とは違う見方で色々な概念を説明しており、多面的な理解に大いに役立つ。',
        ];
        DB::table('posts')->insert($param);

        $param = [
          'user_id' => '2',
          'book' => '日日是好日',
          'title' => '茶道を始めたくなる本',
          'body' => '茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。茶道と人生の接点。',
        ];
        DB::table('posts')->insert($param);

    }
}
