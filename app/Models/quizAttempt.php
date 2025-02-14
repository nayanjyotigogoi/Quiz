<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class QuizAttempt extends Model
{
    use HasFactory; 

    protected $fillable = ['user_id', 'quiz_id', 'score', 'created_at', 'updated_at'];

    /**
     * A quiz attempt belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A quiz attempt belongs to a quiz.
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
