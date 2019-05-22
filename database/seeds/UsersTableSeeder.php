<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $param = [
        'name' => 'onimu',
        'email' => 'onimu16@gmail.com',
        'password' => 'ycln9821',
      ];
      DB::table('users')->insert($param);

      $param = [
        'name' => 'taro',
        'email' => 'taro@gmail.com',
        'password' => 'ycln9821',
      ];
      DB::table('users')->insert($param);

    }
}
