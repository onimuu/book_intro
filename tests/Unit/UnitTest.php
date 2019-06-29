<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Post;

class UnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testBasicTest()
    {
        $this->assertTrue(true);

        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/home');
        $response->assertStatus(302);

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);

        $response = $this->get('/no_route');
        $response->assertStatus(404);

        for ($i=0; $i<100; $i++) {
          factory(Post::class)->create();
        }
        $this->assertSame(100, \DB::table('posts')->count());

        factory(Post::class)->create([
          'user_id' => '4',
          'book' => 'データベース実践入門',
          'title' => '理論が学べる',
          'author' => '奥野幹也',
          'genre' => 'technology',
          'body' => '理論から学ぶため、応用が効く知識が得られる。',
        ]);

        $this->assertDatabaseHas('posts', [
          'user_id' => '4',
          'book' => 'データベース実践入門',
          'title' => '理論が学べる',
          'author' => '奥野幹也',
          'genre' => 'technology',
          'body' => '理論から学ぶため、応用が効く知識が得られる。',
        ]);
    }
}
