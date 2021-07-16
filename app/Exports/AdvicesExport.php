<?php

namespace App\Exports;

use App\Models\Advice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdvicesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Advice::select('id','diagnostic','medical_advice','recipe','today','status')->get();
    }

     public function headings():array
    {
    	return [

    		
    		'Nº CONSULTA',
    		'DIAGNÓSTICO',
    		'INDICAÇÕES MÉDICAS',
    		'RECEITA MÉDICA',
    		'DATA DA CONSULTA',
    		'STATUS'

    	];
    }
}
