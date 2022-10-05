<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescribe extends Model
{
    use HasFactory;
    protected $table='prescribes';
    protected $fillable=[
        'consultation_id',
        'title',
        'comment'
    ];
}
