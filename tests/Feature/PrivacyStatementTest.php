<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class PrivacyStatementTest extends TestCase
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
    public function test_a_user_can_set_a_privacy_statement_and_url()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $privacy_details = [
            'message' => $this->faker->paragraph,
            'url' => $this->faker->url
        ];

        $this->post(route('user.privacy.edit'), $privacy_details);

        self::assertDatabaseHas('users', [
            'id' => $user->id,
            'privacy_statement' => $privacy_details['message'],
            'privacy_url' => $privacy_details['url']
        ]);
    }
}
