<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Patient;
use App\Models\Advice;
use App\Models\Physician;
use DB;

class PdfController extends Controller
{
    public function patientsPdf(Patient $patient){


         if (\Gate::allows('isAdmin')||\Gate::allows('isReceptionist')) {
          $patients = Patient::all();

        $totalPatients= DB::table('patients as pa')
                        
                        ->select(DB::raw('count(pa.id)as total'))
                        
                        ->get()->first();
        $pdf = PDF::loadView('reports.patients_reports.patientsPdf', compact('patients','totalPatients'));
        //return $pdf->download('invoice.pdf');
        return $pdf->setPaper('a4', 'landscape')->stream('Relatório de Pacientes.pdf');
       // return $pdf->stream('Relatório de Pacientes.pdf');
    }else{
        return view('no_authorized');
        
    }

    	
    } 


//===================================================================================================

    public function advice(Advice $advice){

         if (\Gate::allows('isAdmin')||\Gate::allows('isPhysician')) {
          $data = Advice::latest()->get()->first();
        //dd($data);
        $pdf = PDF::loadView('reports.advices.advice',compact('data'));
        //return $pdf->download('invoice.pdf');
        //return $pdf->setPaper('a4', 'landscape')->stream('invoice.pdf');
        return $pdf->setPaper('a4')->stream('Resultado da consulta.pdf');
    }else{
        return view('no_authorized');
        
    }

    	
    }




//===================================================================================================
    //Relatório Diário de cada Médico

     public function physicianTodayPdf( $id,$today)
    {

         if (\Gate::allows('isAdmin')||\Gate::allows('isReceptionist')) {
          $physician = Physician::findOrFail($id);

    $hoje = $today;
    $totalToday= DB::table('advices as ad')
                        
                        ->select(DB::raw('count(ad.id)as total'))
                        ->where('today','=',$hoje)
                        ->where('ad.physician_id','=',$physician->id)
                         ->get()->first();
    

    
    $todaypdf = Advice::where('physician_id','=', $physician->id)
                        ->where('today','=', $hoje)

                             ->orderBy('created_at')->get();
     
    
    $pdf = PDF::loadView('reports.physicians_report.physicianTodayPdf',compact('todaypdf','today','physician','totalToday'));
                                                  

       return $pdf->setPaper('a4')->stream('Relatório Diário');
    }else{
        return view('no_authorized');
        
    }
     
     
    }


//===================================================================================================
// Relatório geral de um médico

    public function physicianAllPdf(Request $request, $id)
    {
     
         if (\Gate::allows('isAdmin')||\Gate::allows('isReceptionist')) {
          $physician = Physician::findOrFail($id);

    $phys = Physician::findOrFail($id);
    

    $totalPhysician= DB::table('advices as ad')
                        
                        ->select(DB::raw('count(ad.id)as total'))
                        ->where('ad.physician_id','=',$phys->id)
                         ->get()->first();
    
    $today = date('Y-m-d');
    $todaypdf = Advice::where('physician_id','=', $physician->id)

                             ->orderBy('created_at')->get();


    //dd($todaypdf);

    $pdf = PDF::loadView('reports.physicians_report.physician_all_pdf',compact('todaypdf','physician','totalPhysician'));
      
    return $pdf->setPaper('a4')->stream('Relatório Médico');

    //return view ();
    }else{
        return view('no_authorized');
        
    }
    
    }


    //===================================================================================================

// Relatório geral de todos os médicos 

    public function physiciansGeneralPdf(Advice $advice)
    {
     
         if (\Gate::allows('isAdmin')||\Gate::allows('isReceptionist')) {
          $totaladvices= DB::table('advices as ad')
                        
                        ->select(DB::raw('count(ad.id)as total'))
                        ->get()->first();
   
    $advices = Advice::all();


    //dd($totaladvices);

    $pdf = PDF::loadView('reports.physicians_report.physiciansGeneralPdf',compact('advices','totaladvices'));
      
    return $pdf->setPaper('a4')->stream('Relatório Geral de Médicos');

    //return view ();
    }else{
        return view('no_authorized');
        
    }
     
    }



    //===================================================================================================
// Relatório diário de todos os médicos

    public function allPhysiciansDiaryPdf(Request $request, Advice $advice)
    {
     
 if (\Gate::allows('isAdmin')||\Gate::allows('isReceptionist')) {
        $today = date('Y-m-d');

    $totalDiary= DB::table('advices as ad')
                        
                        ->select(DB::raw('count(ad.id)as total'))
                        ->where('ad.today',$today)

                        ->get()->first();

    $allDiaryPdf = Advice::where('today','=', $today)

                             ->orderBy('created_at')->get();
  

    $pdf = PDF::loadView('reports.physicians_report.allPhysiciansDiaryPdf',compact('allDiaryPdf','totalDiary','today'));
      
    return $pdf->setPaper('a4')->stream('Relatório Médico');

    //return view ();
    }else{
        return view('no_authorized');
        
    }
  
    
    
    }
}
