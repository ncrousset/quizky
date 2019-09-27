<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = ['id', 'user_id', 'title', 'public'];

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
