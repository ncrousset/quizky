<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $name = "answers";

    protected $fillable = ['question_id', 'description', 'is_valid'];
}
