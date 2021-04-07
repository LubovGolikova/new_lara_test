<?php

namespace App\Models;

use App\Traits\HasRolesPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Facades\JWTAuth;
class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRolesPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'avatar_path',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function user_answer_votes()
    {
        return $this->belongsToMany(Answer::class, 'user_answer_votes','user_id','answer_id');
    }

    public function user_question_votes()
    {
        return $this->belongsToMany(Question::class,'user_question_votes','user_id','question_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles','user_id', 'role_id');
    }

    /**
     * @inheritDoc
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**

     * @inheritDoc
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


}
