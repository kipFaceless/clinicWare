<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AppointmentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Appointment::select('id','condition','dated_to','date_time','status','created_at')->get();
    }



      public function headings():array
    {
    	return [

    		
    		'Nº DO AGENDAMENTO',
    		'ESTADO DO PACIENTE',
    		'DATA DA CONSULTA',
    		'HORA DA CONSULTA',
    		'STATUS DA CONSULTA',
    		'ATENDIDO NO DIA',
    		
    		

    	];
    }
}
