<?php
namespace  App\Repositories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function all()
    {
        return Question::all();
    }

    public function getByUser(User $user)
    {
        return Question::query()->where('user_id'.$user->id)->get();
    }

    public function getById($id)
    {
        return Question::query()->findOrFail($id)->get();
    }

    public function search($str)
    {
        return Question::query()->where('title','LIKE', '%'.$str.'%')->get();
    }

    public function sortData($param)
    {
        if($param==1)
            return Question::query()->orderBy('created_at','DESC')->get();
        else if($param==0)
            return Question::query()->orderBy('created_at','ASC')->get();
    }

    public function sortVotes($param)
    {
        if($param==1)
            return Question::query()->orderBy('votes','DESC')->get();
        else if($param==0)
            return Question::query()->orderBy('votes','ASC')->get();
    }

    public function create(array $data)
    {
        $question = new Question;
        $user = JWTAuth::parseToken()->authenticate();
        $question->user_id = $user->id;
        $question->title = $data['title'];
        $question->body = $data['body'];
        $question->votes = $data['votes'];

        $question->save();

        return $question;
    }

    public function addVote($id)
    {
         $questions = Question::query()->where('id' ,'=', $id)->get();
        foreach($questions as $question)
        {
            $question->setVotes($question->getVotes()+1);
            $question->save();
            return $question;
        }
    }

    public function isAnswer()
    {
        $questions = Question::query()
            ->select()
            ->leftJoin('answers','questions.id', '=', 'answers.id' )
//            ->whereNotIn('answers.id')
            ->get();
        return $questions;
    }

    public function isVoteAnswer()
    {
        $questions = Question::query()
            ->leftJoin('answers','questions.id', '=', 'answers.id' )
            ->where('answers.votes','=',0 )
            ->get();
        return $questions;
    }
}
