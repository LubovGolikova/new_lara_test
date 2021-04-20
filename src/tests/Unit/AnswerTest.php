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
     * A test user can create answer
     * @return void
     */

    /** @test **/
    public function test_user_can_create_answer_second()
    {
        $this->json('POST', '/api/answers/create', [
            'question_id' => 1,
            'body' => 'answer'
        ])
            ->seeJson([
                'created' => true,
            ]);
    }
}
