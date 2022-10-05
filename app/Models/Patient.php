<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table='patients';
    protected $fillable=[
        'pre_name',
        'fname',
        'lname',
        'gender',
        'age',
        'height',
        'weight',
        'address',
        'phone',
        'health_insurance',
        'guardian_name',
        'guardian_phone',
        'relationship',
        'history_id',
        'is_consulted',
        'is_cleared'
    ];
    public function clinical_history()  //making relationship
                {
                     return $this->belongsTo(ClinicalHistory::class);
                }
}
