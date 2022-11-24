<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /** @test*/
    public function user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /** @test*/
    public function user_can_login_and_go_home()
    {
        $user     = User::factory()->create();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
    }
}
