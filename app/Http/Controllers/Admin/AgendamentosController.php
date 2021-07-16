<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\paciente;
use App\Models\medico;
use App\Models\agendamento;
use Carbon\Carbon;

class AgendamentosController extends Controller
{
    //
    public function agendamento(paciente $paciente, Request $request, $id){

    	$paciente = paciente::find($id);
        $dentista = medico::pluck('nome','id');

    	return view('atendimento.agendamento', compact('paciente', 'dentista'));
    }


    public function salvaragendamento(Request $request){

    	

    	return 'salvar  agendamento';
    }

    public function teste(){

    	$dataForm = [1,3,2];
    	$medico = medico::find(2);
    	$doctores =['kip', 'Nkodia', 'pepito'];
    	echo $medico ."<hr>";

    	$medico->pacientes()->sync($dataForm);
    	$pacientes = $medico->pacientes;
    	foreach ($pacientes as $key => $paciente) {
    		echo "{$paciente->nome},";
    	}
    	return view('teste', compact('doctores'));
    }

    public function agendaHoje(){

    	$dataHoje = Carbon::today();

    	
    	$resultados = agendamento::where('status','=', 'aberto','and','data','=',$dataHoje)->get();
        dd($resultados);
    	
    	return view('atendimento.agenda_hoje', compact('resultados'));	
    }
    public function agenda(){

                
        $resultados = agendamento::where('status','=', 'aberto')->get();
        
        return view('atendimento.agenda', compact('resultados'));  
    }

    public function agendaMedico($nome){

        $nomeMed = $nome;       
        $medicos = medico::where('nome', 'LIKE', $nomeMed)->get()->first();
        //dd($medicos);
        $pacientes = $medicos->pacientes;
        foreach ($pacientes as $paciente){
            echo "<br>{$paciente->nome},";
        }
        
       // return view('atendimento.agenda_medico', compact('medicos', 'pacientes'));  


    }
    
}
