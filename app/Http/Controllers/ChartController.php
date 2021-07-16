<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use DB;

class ChartController extends Controller
{


     public function __construct(){
    $this->middleware('auth');
   }
    

    public function charts(){

    	$appointments = Appointment::all();
    	$agendas= DB::table('appointments as ag')
                        ->join('physicians as ph', 'ag.physician_id','=', 'ph.id' )
                        ->join('patients as pa', 'ag.patient_id','=','pa.id')
                        ->select('ag.id','pa.name as pa','ph.name as ph')
                        ->get();
                       // dd($agendas);

    	return view('reports.charts', compact('appointments','agendas'));
    }
}
