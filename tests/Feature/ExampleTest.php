<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_view_user()
    {
        // $response = $this->get('/admin/user');

        // $this->assertAuthenticated();

        // $response->assertStatus(200);

        $this->assertTrue(true);
    }

    public function test_post_login()
    {
        // $user = User::factory()->create();

        // dd($user);

        $this->assertTrue(true);
    }
}
