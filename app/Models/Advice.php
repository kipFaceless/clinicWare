<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    

	public $fillable = ['physician_id', 
						'patient_id',
						'diagnostic',
						'medical_advice',
						'recipe',
						'today',
						'status',
						'symptom',
						'weight',
						'date'
						




];

public function physician(){
    	return $this->belongsTo(Physician::class);
    }

    public function patient(){
    	return $this->belongsTo(Patient::class);
    }
}
