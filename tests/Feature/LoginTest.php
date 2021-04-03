<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Tests\TestCase;
use Illuminate\Database\Seeder;
use App\Models\User; 
use lluminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoginTest extends ExampleTest
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    //　ログイン画面が表示されることを確認
    public function test_view() {
        $response = $this->get('login')
            ->assertOk()
            ->assertSeeText('ログイン');
    }

    //　ログインできることを確認
    public function test_login() {
        $guestuser = User::where('email', '=', 'guest@example.com')->first();
        $response = $this->json('POST', route('login.post'), [
            'email' => 'guest@example.com',
            'password' => 'guestpass',
        ])->assertRedirect(route('dashboard'));
        $this->assertAuthenticated(); //ユーザーが認証されている
    }

    //　ログアウトできることを確認
    public function test_logout() {
        $user = User::find(1); 
        $response = $this->actingAs($user); // actingAsヘルパで認証済みのユーザー（id=1）を指定
        $response->json('POST', route('logout'))
            ->assertRedirect(route('login')); //ログアウト後、ログインページにリダイレクトされてることを確認
        $this->assertGuest(); // assertGuestでユーザーが認証されていないことを確認
    }

    //　emailとpasswordが違うとログインできないことを確認
    public function test_loginFail() {
        $response = $this->json('POST', route('login.post'), [ //適当なメールアドレス・パスワードでログイン
            'email' => $this->faker->safeEmail,
            'password' => 'sample',
        ]);
        $this->assertGuest();
    }
            /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view()
    {
        $user = User::find(1); 
        $response = $this->actingAs($user)
        ->assertOk()
        ->assertSeeText('メールアドレス');
    }
}
