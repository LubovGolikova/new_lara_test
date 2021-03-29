<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestionVote extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function question(){
        return $this->belongsTo(Question::class, 'question_id');
    }
}
