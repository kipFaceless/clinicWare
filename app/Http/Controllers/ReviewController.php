<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Patient;

class ReviewController extends Controller
{

     public function __construct(){
    $this->middleware('auth');
   }
    /**
     =================================================================
     */
    public function index()
    {
        //
    }

    /**
   =========================================================================
     */
    public function create()
    {
        //
    }

    /**
     ======================================================================
     */
    public function store(Request $request)
    {
       
    }

    /**
    ===============================================================================
     */
    public function show(Review $review, Patient $patient)
    {
        $historic=Patient::findOrFail($patient->id);
         dd($historic);
    }

    /**
    ===============================================================================
     */

     public function review(Patient $patient)
    {
        $pat=Patient::find($patient);
        $id=$patient->id;
        $historic=Review::where('patient_id', $id)->get();
        // dd($historic);
        return view('reviews.show', compact('historic'));
    }

    /**
    ============================================================================
     */
    public function edit(Review $review)
    {
        //
    }

    /**
   ====================================================================
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
