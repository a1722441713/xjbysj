<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','url','question_id_value','start_time','end_time',
    ];

    public function fraction(){
        return $this->hasMany(Fraction::class);
    }
}
