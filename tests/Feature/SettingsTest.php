<?php

namespace Tests\Feature;

use App\Models\User;
use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Session::start();
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_settings_page_is_visible()
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get(route('settings.index'));

        $response
            ->assertOk()
            ->assertViewIs('dashboard.settings');
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_a_user_can_update_their_profile_information()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $new_info = [
            'business_name' => $this->faker->company,
            'email' => $this->faker->safeEmail
        ];

        $response = $this->post(route('settings.save'), $new_info);

        $response->assertRedirect(route('settings.index'));
        self::assertDatabaseHas('users', array_merge($new_info, [
            'id' => $user->id
        ]));
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_a_user_can_update_their_password()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $form_info = [
            'current_password' => 'password',
            'password' => 'new_password',
            'password_confirmation' => 'new_password'
        ];

        $response = $this->post(route('settings.update_password'), $form_info);
        $user->refresh();

        $response->assertRedirect(route('settings.index'));
        self::assertTrue(Auth::attempt(['email' => $user->email, 'password' => 'new_password']), 'Password in database does not match the new password, the database was not updated.');
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_error_when_a_user_attempts_to_update_the_password_with_an_incorrect_current_password()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $form_info = [
            'current_password' => 'incorrect_password',
            'password' => 'new_password',
            'password_confirmation' => 'new_password'
        ];

        $response = $this->post(route('settings.update_password'), $form_info);
        $user->refresh();

        $response->assertRedirect(route('settings.index'));
        self::assertFalse(Auth::attempt(['email' => $user->email, 'password' => 'new_password']), 'Password was updated, even though the current password was incorrect.');
    }
}
