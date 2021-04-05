<?php

namespace Tests\Unit\Auth;

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $response = $this->post('/login', [
            'email' => 'okasay@ss.ccx',
            'password' => '111111111',
        ]);

        $response->assertSuccessful();
    }
}
