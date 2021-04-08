<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestionVote extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'user_id';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'question_id',
    ];
}
