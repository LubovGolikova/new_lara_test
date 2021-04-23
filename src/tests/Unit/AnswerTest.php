<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Answer;

class AnswerTest extends TestCase
{

    /**
     * A test user can browse answer
     * @return void
     */

    /** @test **/
    public function test_user_can_browse_answers(): void
    {
        $response = $this->get('/api/answers');
        $response->assertStatus(200);
    }

    /**
     * A test user can create answer
     * @return void
     */

    /** @test **/
    public function test_user_can_create_answer(): void
    {
        $response = $this->post('/api/answers/create', [
            'question_id' => 1,
            'body' => 'answer'
        ]);

        $response->assertSuccessful();
    }

    //TODO
    /**
     * A test user can create vote
     * @return void
     */

    /** @test **/
    public function test_user_can_createVote(): void
    {
        $user = User::factory()->create();
        $answer = Answer::factory()->create();;
        $data = array('user_id' => $user->id, 'answer_id' => $answer->id);
        $createVote = app()->make('AnswerService')->createVote($data);

        $this->assertEquals($data,  json_encode($createVote));
    }

    /**
     * A test user can create answer second
     * @return void
     */

    /** @test **/
    public function test_user_can_create_answer_second()
    {
        $this->json('POST', '/api/answers/create', [
            'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC
            9sb2dpbiIsImlhdCI6MTYxOTE3NzMxMSwiZXhwIjoxNjE5MTgwOTExLCJuYmYiOjE2MTkxNzczMTEsImp0aSI6IjdCcU5WYnZyT0VNTk5XV
            kMiLCJzdWIiOjQxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.qKLMv0h2LlKmmJrIS9XDvML18VtSt2-t5OeKZUmGB0g',
            'question_id' => 1,
            'body' => 'answer'
        ])
            ->assertJson([
                'user_id' =>1,
                'answer_id' =>2
            ]);
    }
}
