<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
//
use Maatwebsite\Excel\Excel;

class UserController extends Controller
{
  
     public function __construct(){
    $this->middleware('auth');
   } 

     
    public function index(Request $request)
    {

        if (\Gate::allows('isAdmin')) {
             //Query Scope - Global Vars in user Model
     $name       =  $request->get('name');
     $email      =  $request->get('email');  
     $address     =  $request->get('address'); 

    $users = user::orderBy('id','DESC')
                            ->name($name)
                            ->email($email)
                            ->address($address)
                            ->paginate(7);
    
       return view('users.index', compact('users'));
     
    }else{
        return view('no_authorized');
    }
   
    }

   //=====================================================================================
    public function create()
    {
        return view('users.create');
    }

   //======================================================================================
    public function store(Request $request, User $user)

    {
        
         $this->validate($request, [
             'name'=>'required|min:2|max:30', 
                            'email'=>'required|unique:users,email',
                            'type'=>'required',
                            'password' => 'required|min:6|max:30',
                            'tel', 
                            'address',
                            'avatar',
        ]);
        
        //$user = $request->all();

        //if ($user['password'] =!null) 
        //    $user['password'] = Hash::make($user['password']);
       
        //dd($user['password']);
       
        //$user['password'] = ($user['password']);
         //dd($user);
        $user = User::create([

            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password']),
            'type'=>$request['type'],
            'tel'=>$request['tel'],
            'address'=>$request['address'],
            'avatar'=>$request['avatar']
        ]);
        if ($user) 
            return redirect()->route('users.index')
                            ->with('success', 'Usuário adicionado com Sucesso!');
        
        return redirect()->back()->with('error', 'Erro ao adicionar novo Usuário!');
    }

    //======================================================================================
    public function show(User $user)
    {
       $show = User::find($user);
      // dd($show);

            return view('users.show', compact('show'));
    }

   //========================================================================================
    public function edit(User $user)

    {   
        $edit = User::find($user->id);
       
        //dd($user) ;
       return view('users.edit', compact('edit'));
    }

   //=========================================================================================
    public function update(Request $request, User $user)
    {
     $use = User::findOrFail($user);
     //dd($use);
        $id = $user->id;
       $this->validate($request, [
             'name'=>'required|string|min:2|max:30', 
                            'type'=>'required',
                            'password'=>'required',
                            
                            'tel', 
                            'address',
                            'email' => 'required|string|email|max:191|unique:users,email,'.$id
        ]);

        $update=$user->update($request->all());
        if ($update) {
            return redirect()
                            ->route('users.index')
                            ->with('success','Dados do usuário alterados com Sucesso!');
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao alterar dados do usuário!');
        }
    }

    //=========================================================================================
    public function destroy(User $user)
    {
        //dd($user);
        $user = User::find($user->id);
        
        $delete= $user->delete();
     if ($delete) {
            return redirect()->back()
                             ->with('success','Usuário excluído com sucesso!');
        }else{
            return redirect()->back()
                             ->with('error','Erro ao excluir Usuário!');
        }
    }

     public function excel( $id)
    {
      
       Excel::create('From Laravel', function($excel) use($id){
             
        $excel->sheet('Excel sheet', function($sheet) use($id) {
            $user =User::find($id);
            $sheet->fromArray('$user');

        });

       })->export('xls');
    }
}
