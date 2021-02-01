<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionABC extends Model
{
    use HasFactory;

    public function question(){
        return $this->morphOne(Question::class, 'real_question');
    }

}