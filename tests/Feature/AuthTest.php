<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_a_guest_should_be_able_to_see_the_register_page()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    public function test_a_guest_should_be_able_to_register()
    {
        $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'test@email.com',
            'username' => 'user',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@email.com',
            'name' => 'Test User',
            'username' => 'user',
        ]);
    }

    public function test_a_guest_should_be_able_to_see_the_login_page()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    public function test_a_guest_should_be_able_to_login_with_valid_credentials()
    {
        $response = $this->post(route('login'), [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(302);

        $this->assertAuthenticatedAs($this->user);
    }

    public function test_a_loggedin_user_should_not_be_able_to_see_the_login_page()
    {
        $this->actingAs($this->user);

        $response = $this->get(route('login'));

        $response->assertRedirect(route('home'));
    }

    public function test_a_loggedin_user_should_not_be_able_to_see_the_register_page()
    {
        $this->actingAs($this->user);

        $response = $this->get(route('register'));

        $response->assertRedirect(route('home'));
    }
}
