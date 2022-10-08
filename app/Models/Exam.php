<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table='exams';
    protected $fillable=['consultation_id','test_id','report','comment','is_resent','is_once_sent_to_consult'];

    public function test()  //making relationship
    {
         return $this->belongsTo(Test::class);
    }
}
