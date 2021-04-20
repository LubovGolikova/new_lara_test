<?php

namespace Tests\Unit;

use Tests\TestCase;

class MailTest extends TestCase
{
    /**
     * A test user can send  email
     * @return void
     */

    /** @test **/
    public function test_user_can_send_email(): void
    {
        $response = $this->get('/api/answers/sendEmail');
        $response->assertStatus(200);
    }
}
