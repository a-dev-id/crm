<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Villa;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villas = Villa::all();
        return view('admin.villa.index')->with(compact('villas'));
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
        if (empty($request->file('image'))) {
            $image = null;
        } else {
            $image = $request->file('image')->store('images/villa', 'public');
        }

        Villa::create([
            'title' => $request->title,
            'image' => $image,
            'wide' => $request->wide,
            'pool_type' => $request->pool_type,
            'view' => $request->view,
            'description' => $request->description,
        ]);
        return redirect()->route('villa.index')->with('message', $request->title.' added Successfully');
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
        $villas = Villa::all();
        $villa = Villa::find($id);
        return view('admin.villa.edit')->with(compact('villa', 'villas'));
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
        if (empty($request->file('image'))) {
            $image = $request->old_image;
        } else {
            $image = $request->file('image')->store('images/villa', 'public');
        }

        $data = villa::find($id);

        $data->title = $request->title;
        $data->image = $image;
        $data->wide = $request->wide;
        $data->pool_type = $request->pool_type;
        $data->view = $request->view;
        $data->description = $request->description;

        $data->save();

        return redirect()->route('villa.index')->with('message', $request->title.' edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = villa::find($id);
        $data->delete();
        return redirect()->route('villa.index')->with('message', $data->title.' deleted Successfully');
    }
}
