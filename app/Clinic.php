<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    //

    public $fillable = [
    						'name',
    						'logo',
    						'contribution_number',
    						 'city',
    						 'address',
    						 'tel',
    						 'email'
    						];
}
