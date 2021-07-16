<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\User;
use Storage;

class ConfigController extends Controller
{
   
   public function __construct(){
   	$this->middleware('auth');
   // $this->authorize('isAdmin');
   }

   public function index(){
   	if (\Gate::allows('isAdmin')) {
   		$cli=1;
   	//dd($cli);
   			return view('config.index',compact('cli'));
   	//$this->authorize('isAdmin');
   	}else{
   		return view('no_authorized');
   	}
   
   }


   public function clinic(){

   	return view('config.clinic_config',compact('cli'));

   }

//=====================================================================================================
   public function store(Request $request, Clinic $clinic){

$this->validate($request, [
             'name'=>'required|min:2|max:30', 
                            'email'=>'unique:clinics,email',
                            'logo'=>'required',
                            'city'=>'required',
                            'address'=>'required',
                            'tel'=>'required'
                          
                           
        ]);

       $store = Clinic::create($request->all());

        if ($request->file('logo')) {

            $path = Storage::disk('public')->put('img', $request->file('logo'));
            \Image::make($request->logo)->save(public_path('img/').$path);

            //$request->photo = $name;
            $request->merge(['logo' => $name]);

           // $store->fill(['image' => asset($path)])->save();
          dd($path);   
          }
       
        if ($store) {
            return redirect()
                            ->route('home')
                            ->with('success','Clínica Configurada com Sucesso!');
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao configurar a Clínica!');
        }
       
   }

   public function editClinic(Clinic $cli){
   	$clinic=Clinic::find($cli);


   		return view('config.clinic_config', compact('clinic','cli'));
   }

//=======================================================================================
public function clinicUpdate(Request $request, Clinic $cli){

	$clinic=Clinic::find($cli->id);
	//dd($clinic);

	$this->validate($request, [
             'name'=>'required|min:2|max:30', 
                            'city'=>'required',
                            'address'=>'required',
                            'logo'=>'required',
                            'tel'=>'required'
                          
                           
        ]);

       $update = $clinic->update($request->all());

       
        if ($update) {
            return redirect()
                            ->back()
                            ->with('success','Informações da Clínica actualizadas com Sucesso!');
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao actualizar as informações a Clínica!');
        }

	
}

public function clinicShow(Clinic $cli){

	$clinic=Clinic::find($cli);
	return view('config.clinic_show', compact('clinic'));
}
}
