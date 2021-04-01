<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'user_id',
        'question_id',
        'votes'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function users_answers_votes()
    {
        return $this->belongsToMany(UserAnswerVote::class, 'answer_id');
    }
    public function setVotes($votes)
    {
        $this->votes = $votes;
        return $this;
    }

    public function getVotes()
    {
        return $this->votes;
    }
}
