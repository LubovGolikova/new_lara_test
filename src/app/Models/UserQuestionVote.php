<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestionVote extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function questions(){
        return $this->belongsTo('App\Models\Question', 'question_id');
    }
}
