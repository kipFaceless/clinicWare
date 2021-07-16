<?php

namespace App\Http\Controllers;

use App\Models\Relationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    
    public function index(Request $request, Relationship $relationship)
    {
    
    $relationships = Relationship::orderBy('id')->paginate(7);

       return view('relationships.index', compact('relationships'));
    }

   //=====================================================================================
    public function create()
    {
        return view('relationships.create-edit');
    }

   //======================================================================================
    public function store(Request $request, Relationship $relationship)
    {

        $this->validate($request, [
              
                            'name'=>'required|string|min:2|max:30'
                            ]);

                            
        $relationship = Relationship::create($request->all());
         if ($relationship) {
            return redirect()->back()
                             ->with('success','Grau de afinidade inserido com sucesso!');
        }else{
            return redirect()->back()
                             ->with('error','Erro ao inserir grau de afinidade!');
        }
        
    }

    //========================================================================================
    public function edit(Relationship $relationship)

    {   
        $relationship = Relationship::find($relationship->id);
       
      
       return view('relationships.create-edit', compact('relationship'));
    }

   //=========================================================================================
    public function update(Request $request, relationship $relationship)
    {

        $relationship = Relationship::find($relationship->id);
         $this->validate($request, [
              
                            'name'=>'required|string|min:2|max:30'
                            ]);

                            
        $update = $relationship->update($request->all());
         if ($update) {
            return redirect()->back()
                             ->with('success','Grau de afinidade actualizado com sucesso!');
        }else{
            return redirect()->back()
                             ->with('error','Erro ao actualizar grau de afinidade!');
        }
    }

    //=========================================================================================
    public function destroy(Relationship $relationship)
    {
        $relationship = Relationship::find($relationship->id);
        $relationship->delete();
        return redirect()->back();
    }
}
