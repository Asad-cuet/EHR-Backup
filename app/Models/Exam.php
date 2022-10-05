<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table='exams';
    protected $fillable=['consultation_id','test_id','report'];

    public function test()  //making relationship
    {
         return $this->belongsTo(Test::class);
    }
}
