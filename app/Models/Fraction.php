<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id','form_id','fraction',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function form(){
        return $this->belongsTo(Form::class);
    }
}
