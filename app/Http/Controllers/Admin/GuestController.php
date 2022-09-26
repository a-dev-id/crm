<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Guest;
use App\Models\Honorific;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::all();
        return view('admin.guest.index')->with(compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $honorifics = Honorific::all();
        return view('admin.guest.create')->with(compact('countries', 'honorifics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Guest::create([
            'title' => $request->title,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'country' => $request->country,
            'status' => '1',
        ]);
        return redirect()->route('guest.index')->with('message', $request->title." ". $request->name. ' added Successfully');
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
        $guest = Guest::find($id);
        $honorifics = Honorific::all();
        $countries = Country::all();
        return view('admin.guest.edit')->with(compact('guest', 'honorifics', 'countries'));
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
        $data = Guest::find($id);

        $data->title = $request->title;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->date_of_birth = $request->date_of_birth;
        $data->country = $request->country;
        $data->status = $request->status;

        $data->save();

        return redirect()->route('guest.index')->with('message', $request->title." ". $request->name. ' edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Guest::find($id);
        $data->delete();
        return redirect()->route('guest.index')->with('message', $data->title." ". $data->name. ' deleted Successfully');
    }
}
