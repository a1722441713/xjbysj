<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id','option_one','option_two','option_three','option_four'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
