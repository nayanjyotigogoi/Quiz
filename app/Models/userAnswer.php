<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class userAnswer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'question_id', 'selected_option_id'];

    // A user answer belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // A user answer belongs to a question
    public function question()
    {
        return $this->belongsTo(question::class, 'question_id');
    }

    // A user answer is linked to an option
    public function selectedOption()
    {
        return $this->belongsTo(option::class, 'selected_option_id');
    }
}
