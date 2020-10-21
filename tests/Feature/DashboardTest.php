<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class DashboardTest extends TestCase
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
    public function test_a_logged_in_user_can_see_the_dashboard()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());

        $response = $this->get(route('dashboard'));
        $response->assertOk();
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_redirect_to_registration_if_not_logged_in()
    {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect(route('register'));
    }
}
