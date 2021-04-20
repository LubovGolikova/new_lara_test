<?php

namespace Tests\Unit;

use Tests\TestCase;

class QuestionTest extends TestCase
{
    /**
     * A test user can browse questions
     * @return void
     */

    /** @test **/
    public function test_user_can_browse_questions(): void
    {
        $response = $this->get('/api/questions');
        $response->assertStatus(200);
    }
}
