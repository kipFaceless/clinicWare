<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\medico;

class MedicoController extends Controller
{
    private $medico;



/**
     ==============================================================================================
     */
    public function __construct(medico $medico){

     $this->medico = $medico;
    }

/**
     ==============================================================================================
     */
    public function index(medico $medico, Request $request)
    {
       $nome = $request->get('nome');
       $email =$request->get('email');
       $especialidade=$request->get('especialidade');
       $medicos = medico::orderBy('id', 'DESC')
                        ->nome($nome)
                        ->email($email)
                        ->especialidade($especialidade)
                        ->paginate(7);

      return view('dentista.index', compact('medicos'));
    }

/**
     ==============================================================================================
     */
    
    public function create()
    {
        return view('dentista.create-edit');
    }

    /**
     ==============================================================================================
     */

    public function store(Request $request  )
    {
       
        $dataForm = $request->except('_token');
       
        $inserir = $this->medico->create($dataForm);
       if($inserir)
     return redirect()->route('medico.create');

    }


/**
     ==============================================================================================
     */
    public function show($id)
    {
       
        $show = $this->medico->find($id);
      return view('dentista.show', compact('show'));
    }

    /**
     ==============================================================================================
     */
    public function edit($id)
    {

        $medico = $this->medico->find($id);  
       
        return view('dentista.create-edit', compact('medico'));

    }

   /**
     ==============================================================================================
     */


    public function update(Request $request, $id)
    {
        
        $medico = $this->medico->find($id);
        $dataForm = $request->all();
       
        $update = $medico->update($dataForm);
        if ($update) {
            return redirect()
                    ->route('medico.index');
        }else {
            return redirect()
                    ->route('medico.edit')
                    ->with(['errors'=>'Falha ao Editar!']);
        
    }
}
    /**
     ==============================================================================================
     */


    public function destroy($id)
    {
        $medico = $this->medico->find($id);

        $delete = $medico->delete();
        if ($delete) {
            return redirect()
                    ->route('medico.index');
        }else {
            return redirect()
                    ->route('medico.index')
                    ->with(['errors'=>'Falha ao Eliminar!']);
        
    }
    }
}
