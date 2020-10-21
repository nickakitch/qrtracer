<?php

namespace Tests\Feature;

use App\Models\Checkin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class CheckinTest extends TestCase
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
    public function test_checkin_form_is_visible()
    {
        $business = User::factory()->create();

        $response = $this->get(route('checkin.create', ['user_uuid' => $business->uuid]));
        $response->assertOk();
        $response->assertViewIs('checkin.new');
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_a_user_can_checkin()
    {
        $business = User::factory()->create();
        $user_info = [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email
        ];

        $this->post(route('checkin.store', ['user_uuid' => $business->uuid]), $user_info);

        self::assertDatabaseHas('checkins', array_merge([
            'user_id' => $business->id
        ], $user_info));
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_a_user_is_redirected_to_success_page_if_checkin_successful()
    {
        $business = User::factory()->create();

        $response = $this->post(route('checkin.store', ['user_uuid' => $business->uuid]), [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email
        ]);

        $response->assertRedirect(route('checkin.success'));
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_a_user_can_download_a_csv_for_checkins_to_their_business()
    {
        $business = User::factory()->create();
        Checkin::factory()->count(300)->create([
            'user_id' => $business->id
        ]);
        $this->actingAs($business);

        $response = $this->get(route('checkin.index'));
        $response->assertOk();
    }
}
