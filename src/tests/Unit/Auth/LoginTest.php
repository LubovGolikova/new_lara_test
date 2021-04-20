<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A test user can login with correct credentials
     * @return void
     */

    /** @test **/
    public function test_user_can_login_with_correct_credentials(): void
    {
        $response = $this->post('/api/auth/login', [
            'email' => 'qwerty1@sps.ccx',
            'password' => '111111111',
        ]);

        $response->assertSuccessful();
    }
}
