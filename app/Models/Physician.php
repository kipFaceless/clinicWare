<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Physician extends Model
{
    
    public $fillable = ['speciality_id', 'name', 'physician_order_number', 'tel', 'email', 'avatar', 'address'];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function advices(){
    	return $this->hasMany(Advice::class);
    }

    public function patients(){
    	return $this->hasManyThrough(Patient::class, Appointment::class);
    }
    public function speciality(){

        return $this->hasOne(Speciality::class);
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
