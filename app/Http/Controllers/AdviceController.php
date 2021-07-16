<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Physician;
use App\Models\Appointment;
use DB;
use App\Exports\AdvicesExport;

use Maatwebsite\Excel\Facades\Excel;
class AdviceController extends Controller
{
   


    public function __construct(){
    $this->middleware('auth');
   }
    
    public function index()
    {
            if (\Gate::allows('isAdmin')||\Gate::allows('isReceptionist')) {
           $advices=Advice::paginate(7);
        return view('advices.index',compact('advices'));
    }else{
        return view('no_authorized');
    }


    }

    /**
   ==================================================================================================
     */
    public function create(Patient $id)
    {
        $year =date('Y');
        $patient=Patient::find($id);
    // dd($patient);
        $physicians = Physician::pluck('name', 'id');
        return view('advices.advice', compact('year','patient', 'physicians'));
    }

    
    public function getadvice(Patient $id, Physician $phy_id)

    {
        
        $physician =$phy_id;
        //dd($physician;
        $today = date('Y-m-d');
        $year =date('Y');
        $patient=Patient::find($id);
        $pat=Patient::find($id->id);
        $weight=DB::table('appointments as ap')
                        ->join('patients as pa', 'ap.patient_id','=','pa.id')
                        ->select('ap.weight as weight', 'ap.symptom as symptom')
                        ->get()->first();
        //dd($weight);

        $sex=$pat->sex;
        $address=$pat->address;
        $tel=$pat->tel;
        //dd($sex);
     //dd($patient);
        //$physicians = Physician::pluck('name', 'id');
        return view('advices.advice', compact('year','patient', 'physician','address','sex','tel','weight','today'));
    }

    /**
     ==============================================================================================
     */
    public function store(Request $request)
    {
    //$store= $request->all();
     //dd($store);


      $this->validate($request, [
              
                            'physician_id'=>'required',
                            'patient_id'=>'required',
                            'diagnostic'=>'required',
                            'medical_advice', 
                            'recipe',
                            'symptom',
                            'condition'
                            
        ]);

         
        $save=Advice::create($request->except(['_token']));
         

        if ($save) {
             
       return view('advices.print', compact('save'))->with('success','Consulta Finalizada com Sucesso!');
         }else{
            return redirect()->back()->with('error','Erro ao finalizar Consulta!');
         }

    }
   

    /**
     =================================================================================================
     */
    public function show(Advice $advice)
    {
        $show = $advice;
        //($show);

           // return view('advices.show', compact('show'));
    }

    /**
    =====================================================================================
     */
     public function details(Advice $id)
    {
        $details = Advice::find($id);
       $show=$details->first();
       //dd($show);

        return view('advices.details', compact('show'));
    }

    /**
    =====================================================================================
     */
    public function edit(Advice $advice)
    {
        //
    }

    /**
    =====================================================================================
     */
    public function update(Request $request, Advice $advice)
    {
        //
    }

    /**
     =========================================================================================
     */
    public function destroy(Advice $advice)
    {
       
       $adv = Advice::find($advice->id);
       //dd($adv);
        $delete = $adv->delete();
        if ($delete) {
            return redirect()->back()
                             ->with('success','Consulta excluída com sucesso!');
        }else{
            return redirect()->back()
                             ->with('error','Erro ao excluir consulta!');
        }

        
    }


    public function export() 
    {
        return Excel::download(new AdvicesExport, 'consultas.xlsx');
    }
}
