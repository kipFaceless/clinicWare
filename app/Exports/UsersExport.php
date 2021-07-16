<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientsExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::select('name','email', 'address', 'tel', 'type');
    }



     public function headings():array
    {
    	return [

    		
    		'NOME',
    		'EMAIL',
    		'ENDEREÇO',
    		'TEL',
    		'PERFIL'

    	];
    }
}
