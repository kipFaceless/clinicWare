<?php

namespace App;
use Cache;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
                            'name', 
                            'email',
                            'password',
                            'tel', 
                            'address',
                            'avatar',
                            'type'
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];



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

public function isOnline(){
    return Cache::has('user-online' .$this->id);
}

}
