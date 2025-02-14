<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    // A user can attempt multiple quizzes
    public function quizAttempts()
    {
        return $this->hasMany(quizAttempt::class, 'user_id');
    }

    // A user has multiple answers
    public function userAnswers()
    {
        return $this->hasMany(userAnswer::class, 'user_id');
    }
}
