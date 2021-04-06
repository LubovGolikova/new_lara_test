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
        return Question::query()->with('answers')->get();
    }

    public function getByUser(User $user)
    {
        return Question::query()->where('user_id'.$user->id)->get();
    }

    public function getById($id)
    {
        return Question::query()->findOrFail($id)->get();
    }

    public function create(array $data)
    {
        return Question::create($data);
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

    public function search($str)
    {
        if($str['s'] == 'all'){
            return Question::query()
                ->orderBy($str['sortOrder'],$str['sortDir'])
                ->get();

        }else{
            $searchStr=$str['s'];
            return Question::query()->where('title','LIKE', '%'.$searchStr.'%')
                ->orderBy($str['sortOrder'],$str['sortDir'])
                ->get();

        }
    }

    public function sortData($str)
    {
//        return($str);
        if($str['sortBy']=='isAnswer'){
            return Question::has('answers')
                ->orderBy($str['sortOrder'],$str['sortDir'])
                ->get();

        }else if($str['sortBy']=='isNotAnswer') {
            return Question::query()
                ->whereDoesntHave('answers')
                ->orderBy($str['sortOrder'], $str['sortDir'])
                ->get();
        }
        //TODO
//        }else if($str['sortBy']=='isNotVoteAnswer'){
//            return Question::query()
//                ->leftJoin('answers','questions.id', '=', 'answers.id' )
//                ->where('answers.votes','=',0 )
//                ->orderBy($str['sortOrder'],$str['sortDir'])
//                ->get();
//        }else if($str['sortBy']=='isVoteAnswer'){
//            return Question::query()
//                ->whereHas('answers', function($query) {
//                    $query->where('votes','!=', 0);
//                })
//                ->orderBy($str['sortOrder'],$str['sortDir'])
//                ->get();
//        }
    }
}
