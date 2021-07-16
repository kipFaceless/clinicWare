<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

	public $fillable = ['physician_id', 
						'patient_id',
						'relationship_id',
						'weight',
						'accompanyng',
						'symptom',
						'condition',
						'status',
						'dated_to',
						'date_time'




];
   public function patient(){
   	return $this->belongsTo(Patient::class);
   }
   public function physician(){
   	return $this->belongsTo(Physician::class);
   }


}
