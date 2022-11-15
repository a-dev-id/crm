<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfirmationLetter;
use App\Models\Guest;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationLetterMail;

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

        $guest = Guest::where('id', '=', $request->guest_id)->first();
        $villa = Villa::where('id', '=', '8')->first();

        $data = [
            'full_name' => $guest->title.'. '.$guest->name,
            'confirmation_no' => $request->confirmation_no,
            'arrival' => $request->arrival,
            'departure' => $request->departure,
            'adult' => $request->adult,
            'child' => $request->child,
            'currency' => $request->currency,
            'price' => $request->price,
            'villa_title' => $villa->title,
            'villa_image' => $villa->image,
            'villa_wide' => $villa->wide,
            'villa_pool_type' => $villa->pool_type,
            'villa_view' => $villa->view,
            'villa_description' => $villa->description,
        ];

        Mail::to($guest->email)->cc('angga@hanginggardensinternational.com')->send(new ConfirmationLetterMail($data));

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
