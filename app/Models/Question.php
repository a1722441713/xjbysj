<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id','text','answer_one','answer_two','answer_three','answer_four',
    ];

    public function answer(){
        return $this->hasOne(Answer::class);
    }
}
