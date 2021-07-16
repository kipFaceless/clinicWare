<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{


	public $fillable = ['name', 'description'];
	public $timestamps=false;
    public function appointment(){

    	return $this->belongsTo(Appointment::class);
    }
}
