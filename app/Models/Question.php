<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory, CrudTrait;

    protected $guarded = ['id'];
    protected $casts = [
        'data' => 'array'
    ];

    public const TYPE_MULTI_CHOICE = 0;
    public const TYPE_DRAG_JOIN = 1;
    public const TYPE_IMAGE = 2;
    public const TYPE_QUESTION_ANSWER = 3;
    public const TYPE_YES_NO = 4;
    public const TYPES = [
        self::TYPE_MULTI_CHOICE => "multiChoice",
        self::TYPE_DRAG_JOIN => "dragJoin",
        self::TYPE_IMAGE => "image",
        self::TYPE_QUESTION_ANSWER => "questionAnswer",
        self::TYPE_YES_NO => "yesNo",
    ];

    // RELATIONS

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
