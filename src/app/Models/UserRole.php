<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'user_id';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'role_id',
    ];
}
