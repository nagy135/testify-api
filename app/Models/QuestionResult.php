<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionResult extends Model
{
    use HasFactory;

    public const STATE_PENDING = 1;
    public const STATE_DONE = 2;
    public const STATE_RESULT = 3;
    public const STATES = [
        self::STATE_PENDING => 'pending',
        self::STATE_DONE => 'done',
        self::STATE_RESULT => 'result',
    ];
}