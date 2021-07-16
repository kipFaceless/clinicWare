<?php

namespace App\Exports;

use App\Models\Patient;
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
        return Patient::select('id','name','sex','date_of_birth','identification','identification_number', 'address','email','tel','created_at');
    }



   /* public function map($patient):array
    {
    	return [
    		'Custom Text' .$patient->name,
    		$patient->email,
    	];
    }

    */

    public function headings():array
    {
    	return [

    		'ID',
    		'NOME',
    		'GÉNERO',
    		'ANO DE NASCIMENTO',
    		'TIPO DE DOCUMENTO',
    		'Nº DOCUMENTO',
    		'ENDEREÇO',
    		'EMAIL',
    		'TEL',
    		'CADASTRADO NO DIA'

    	];
    }
}
