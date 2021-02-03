<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class, 'user_school', 'user_id', 'school_id');
    }

    public function teachers(){
        return $this->users()->where([
            'teacher' => true
        ])->get();
    }
}
