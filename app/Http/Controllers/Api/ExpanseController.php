<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\expence;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpanseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $expanse = expence::get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData =  $request->validate([
            'details' => 'required',
            'amount' => 'required',
        ]);
        $expanse = new expence;
        $expanse->details = $request->details;
        $expanse->amount = $request->amount;
        $expanse->expanse_date = Carbon::now();
        $expanse->save();
        return $expanse;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return $salary_edit = expence::find($id);
    }

    public function update(Request $request, string $id)
    {
        $validData =  $request->validate([
            'details' => 'required',
            'amount' => 'required',
        ]);
        $expanse = expence::find($id);
        $expanse->details = $request->details;
        $expanse->amount = $request->amount;
        $expanse->expanse_date = Carbon::now();
        $expanse->save();
        return $expanse;
    }
    
    public function destroy(string $id)
    {
      return $expa = expence::find($id)->delete();
    }
}
