<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Tests\TestCase;
use Illuminate\Database\Seeder;
use App\Models\User; 
use lluminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingTest extends ExampleTest
{
    use WithFaker;

     //　表示の確認
    public function test_view() {
        $user = User::find(1); 
        $response = $this->actingAs($user)->get(route('setting'))
        ->assertOk()
        ->assertSeeText('メールアドレス');
    }

    //　設定画面から更新できることの確認
    public function test_settingUpdate() {
        $user = User::find(1); 
        $response = $this->actingAs($user)->get(route('setting'));
        $response = $this->json('POST', route('member.setting.update'), [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'email' => 'info@alterego056.com', // バリデーションに「email:strict,dns,spoof」を入れているため、実在するメールアドレスを用意
        ])->assertRedirect(route('setting'));
    }

    //　ゲストユーザーは設定画面から情報更新できないことの確認
    public function test_settingGuest() {
        $user = User::find(1); 
        $response = $this->actingAs($user)->get(route('setting'));
        $response = $this->json('POST', route('member.setting.update'), [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'email' => 'info@alterego056.com', // バリデーションに「email:strict,dns,spoof」を入れているため、実在するメールアドレスを用意
        ])->assertRedirect(route('setting'));
    }

}
