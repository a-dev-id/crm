<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DrinkCategory;
use App\Models\Drink;
use Illuminate\Support\Str;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::all();
        return view('admin.drink.index')->with(compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drink_categories = DrinkCategory::all();
        return view('admin.drink.create')->with(compact('drink_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Drink::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'drink_category_id' => $request->drink_category_id,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        return redirect()->route('drink.index')->with('message', $request->title . ' created Successfully');
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
        $drink_categories = DrinkCategory::all();
        $drink = Drink::find($id);
        return view('admin.drink.edit')->with(compact('drink_categories', 'drink'));
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
        $p = Drink::find($id);

        $p->title = $request->title;
        $p->slug = Str::slug($request->title);
        $p->excerpt = $request->excerpt;
        $p->description = $request->description;
        $p->drink_category_id = $request->drink_category_id;
        $p->price = $request->price;
        $p->status = $request->status;

        $p->save();

        return redirect()->route('drink.index')->with('message', $request->title . ' edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Drink::find($id);
        $p->delete();
        return redirect()->route('drink.index')->with('message', $p->title . ' deleted Successfully');
    }
}
