<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = "quizs";

    protected $fillable = ['subcategory_id', 'quizzes_name', 'quiz_description'];

    // Relationship with Subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // Relationship with Questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
