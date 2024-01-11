<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAuthControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testUserLogin()
    {
        $response = $this->get(route('user.login'));
        $response->assertStatus(200)->assertViewIs('auth.user.login');

        $credentials = [
            'email' => 'test@example.com',
            'password' => 'password123',
        ];

        $response = $this->post(route('user.login'), $credentials);
        $response->assertRedirect('/pages/home');
        $this->assertAuthenticated(); // Memeriksa apakah pengguna berhasil login
    }
}
