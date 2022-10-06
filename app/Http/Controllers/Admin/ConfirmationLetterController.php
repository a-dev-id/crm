<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfirmationLetter;
use App\Models\Guest;
use App\Models\Villa;
use Illuminate\Http\Request;

class ConfirmationLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::where('status', '=', '1')->get();
        $villas = Villa::all();
        return view('admin.confirmation-letter.index')->with(compact('guests', 'villas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ConfirmationLetter::create([
            'guest_id' => $request->guest_id,
            'confirmation_no' => $request->confirmation_no,
            'arrival' => $request->arrival,
            'departure' => $request->departure,
            'adult' => $request->adult,
            'child' => $request->child,
            'villa_id' => $request->villa_id,
            'currency' => $request->currency,
            'price' => $request->price,
        ]);
        return redirect()->route('confirmation-letter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
