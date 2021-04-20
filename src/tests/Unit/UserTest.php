<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A test user can destroy user
     * @return void
     */

    /** @test **/
    public function test_user_can_destroy_user(): void
    {
        $response = $this->delete('/api/admin/user/delete', [
            'id' => 47
        ]);
        $response->assertStatus(200);
    }
}
