<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = ['quiz_id', 'description', 'type', 'is_actived'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
