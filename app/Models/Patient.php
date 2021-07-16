<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $fillable = [
    						'name',
    						'identification',
    						'identification_number',
    						 'date_of_birth',
    						 'sex',
    						 'address',
    						 'tel',
    						 'email'
    						];


    public function appointments(){
        return $this->hasMany(Appointment::class);
    } 

    public function advices(){
    	return $this->hasMany(Patient::class);
    }

    public function physicians(){
    	return $this->hasManyThrough(Physician::class, Appointment::class);
    }


//===QUERY SCOPE===========================================================================

public function scopeName($query, $name){
    if($name)
        return $query->where('name', 'LIKE', "%$name%");
}

public function scopeEmail($query, $email){
    if($email)
        return $query->where('email', 'LIKE', "%$email%");
}

public function scopeAddress($query, $address){
    if($address)
        return $query->where('address', 'LIKE', "%$address%");
}
}
