<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Tests\TestCase;
use Illuminate\Database\Seeder;
use App\Models\User; 

class LoginTest extends ExampleTest
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }
    
    public function assertLogin() {
        $response->assertOk();
        //　ログイン後、ユーザーが認証されていることを確認
        $this->assertAuthenticatedAs($this->user);
    }

    //　ログイン画面が表示されることを確認
    public function testLoginView() {
        $response = $this->get('login');
        $response->assertStatus(200)
                    ->assertSeeText('ログイン');
    }

    //　ゲストユーザーでログインできることを確認
    public function guestLogin() {
        $response = $this->json('POST', route('loginPost'), [
            'email' => 'guest@example.com',
            'password' => 'guestpass',
        ]);
        $this->assertLogin();
    }

    //　ログインできることを確認
    public function login() {
        $user = User::find(1);
        $response = $this->json('POST', route('loginPost'), [
            'email' => $user->email,
            'password' => $user->password,
        ]);
        $this->assertLogin();
    }


}
