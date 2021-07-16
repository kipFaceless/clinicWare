<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Physician;
use App\Models\Patient;
use App\Models\Relationship;
use Illuminate\Http\Request;
use DB;
use Carbon;

use App\Exports\AppointmentsExport;
use Maatwebsite\Excel\Facades\Excel;

class AppointmentController extends Controller
{
    


     public function __construct(){
    $this->middleware('auth');
   }
   
     public function index()
    {

         if (\Gate::allows('isAdmin')||\Gate::allows('isReceptionist')) {
          /*Query Scope - Global Vars in appointment Model
     $name       =  $request->get('name');
     $email      =  $request->get('email');  
     $address     =  $request->get('address'); 

                            ->name($name)
                            ->email($email)
                            ->address($address)
                            */
    $today = date('Y-m-d');
    $appointments = Appointment::where('status','=','Agendado')
                                ->orderBy('date_time')
                                ->paginate(7);
       return view('appointments.index', compact('appointments','today'));
    }else{
        return view('no_authorized');
        
    }
    
    }


    //=====================================================================================


    public function today($today){

         if (\Gate::allows('isAdmin')||\Gate::allows('isReceptionist')) {
         $today_appointments = Appointment::where('dated_to', $today)
                                        ->where('status', 'Agendado')
                                        ->orWhere('status','Em atendimento')
                                         ->orderBy('date_time')
                                        ->paginate(7);

       //return view('appointments.index', compact('appointments','today'));
        //dd($today_appointments);
        return view('appointments/today', compact('today_appointments'));
    }else{
        return view('no_authorized');
        
    }

          
    }

   //=====================================================================================


    public function create( )
    {
      $patient = Patient::pluck('name', 'id');

        $relationships = Relationship::pluck('name', 'id')->prepend('Grau de afinidade');
        $physicians = Physician::pluck('name', 'id');
        return view('appointments.create-edit', compact('physicians', 'relationships', 'patient'));
      
    }
   //=====================================================================================


   
   //======================================================================================
    public function store(Request $request,Appointment $appointment)

    {
       //$ag = $request->all();
    //dd($request->all());

         $this->validate($request, [
              
                            'physician_id'=>'required',
                            'patient_id'=>'required',
                            'relationship_id' =>'required',
                            'weight', 
                            'accompanyng',
                            'symptom',
                            'condition',
                            'status'=>'required',
                            'dated_to'=>'required',
                            'date_time'=>'required',
        ]);

        $appointment = Appointment::create($request->all());


         if ($appointment) {
            return redirect()
                            ->route('appointments.index')
                            ->with('success','Paciente agendado com Sucesso!');
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao agendar Paciente!');
        }

        
    }

    //======================================================================================
    public function show(Appointment $appointment)
    {
       /*$appointment_id = Appointment::find($appointment->id);
       dd($appointment_id->dated_to);
        $id =$appointment_id->id;
        $today = date('Y-m-d');
       $agenda= DB::table('appointments as ag')
                        ->join('physicians as ph', 'ag.physician_id','=', 'ph.id' )
                        ->join('patients as pa', 'ag.patient_id','=','pa.id')
                        ->select('ag.id','pa.name','ph.name','ag.symptom', 'ag.dated_to')
                        ->where('ag.id','=',$id, 'AND', 'ag.dated_to','=','2018-10-26','AND', 'ag.status','=', 'Agendado')
                        ->get();
                        //->first();
        

        dd($agenda);
            return view('appointments.show', compact('appointment_id'));*/
    }

   //========================================================================================
    public function edit(Appointment $appointment)

    {   
        $appointment = Appointment::find($appointment->id);

        $relationships = Relationship::pluck('name', 'id');
        $physicians = Physician::pluck('name', 'id');
       //dd($appointment);
      
       return view('appointments.edit', compact('appointment','relationships','relationships','physicians'));
    }

   //=========================================================================================
    public function update(Request $request, Appointment $appointment)
    {
         $this->validate($request, [
              
                            'physician_id'=>'required',
                            
                            'relationship_id',
                            'weight', 
                            'accompanyng',
                            'symptom',
                            'condition',
                            'status'=>'required',
                            'dated_to'=>'required',
                            'date_time'=>'required',
        ]);

        $appointment=Appointment::findOrFail($appointment->id);
         $update=$appointment->update($request->all());
        if ($update) {
            return redirect()
                            ->route('appointments.index')
                            ->with('success','Agendamento editado com Sucesso!');
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro editar o agendamento!');
        }
    }

    //=========================================================================================
    public function destroy(Appointment $appointment )
        {

        $appointment = Appointment::find($appointment->id);
        $delete =$appointment->delete();

         if ($delete) {
            return redirect()->back()
                             ->with('success','Agendamento excluído com sucesso!');
        }else{
            return redirect()->back()
                             ->with('error','Erro ao excluir agendamento!');
        }
        
    }


    public function export() 
    {
        return Excel::download(new AppointmentsExport, 'Agendamentos.xlsx');
    }

    /* public function dating()
    {
        $patients = Patient::orderBy('id')->paginate();
       return view('appointments.dating', compact('patients'));
    }

     public function patient($id)
    {
        $patient = Patient::find($id);

        $relationships = Relationship::pluck('name', 'id');
        $physicians = Physician::pluck('name', 'id');
        return view('appointments.create-edit', compact('physicians', 'relationships', 'patient'));
        //dd($patient->i-d);
       return view('appointments.dating', compact('patient'));
    }*/
}