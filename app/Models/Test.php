<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory, CrudTrait;

    protected $guarded = ['id'];

    // RELATIONS

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
