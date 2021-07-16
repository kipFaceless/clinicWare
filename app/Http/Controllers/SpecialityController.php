<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    

   public function index(Request $request, Speciality $speciality)
    {
    
    $specialities = Speciality::orderBy('id')->paginate(7);

       return view('specialities.index', compact('specialities'));
    }

   //=====================================================================================
    public function create()
    {
        return view('specialities.create-edit');
    }

   //======================================================================================
    public function store(Request $request, Speciality $speciality)
    {
        $speciality = Speciality::create($request->all());
        return redirect()->back();
    }

    //========================================================================================
    public function edit(Speciality $speciality)

    {   
        $speciality = Speciality::find($speciality->id);
       
      
       return view('specialities.create-edit', compact('speciality'));
    }

   //=========================================================================================
    public function update(Request $request, Speciality $speciality)
    {
        //
    }

    //=========================================================================================
    public function destroy(Speciality $speciality)
    {
        $speciality = Speciality::find($speciality);
        $speciality->delete();
        return redirect()->back();
    }
}
