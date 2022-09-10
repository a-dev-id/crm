<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FoodCategory;
use App\Models\Food;
use App\Models\FoodImage;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        return view('admin.food.index')->with(compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $food_categories = FoodCategory::all();
        return view('admin.food.create')->with(compact('food_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Food::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'food_category_id' => $request->food_category_id,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        return redirect()->route('food.index')->with('message', $request->title . ' created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);
        $food_images = FoodImage::where('food_id', $id)->get();
        return view('admin.food-images.index')->with(compact('food', 'food_images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food_categories = FoodCategory::all();
        $food = Food::find($id);
        return view('admin.food.edit')->with(compact('food_categories', 'food'));
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
        $p = Food::find($id);

        $p->title = $request->title;
        $p->slug = Str::slug($request->title);
        $p->excerpt = $request->excerpt;
        $p->description = $request->description;
        $p->food_category_id = $request->food_category_id;
        $p->price = $request->price;
        $p->status = $request->status;

        $p->save();

        return redirect()->route('food.index')->with('message', $request->title . ' edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Food::find($id);
        $p->delete();
        return redirect()->route('food.index')->with('message', $p->title . ' deleted Successfully');
    }
}
