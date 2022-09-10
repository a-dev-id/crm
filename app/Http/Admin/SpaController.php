<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Spa;
use App\Models\SpaCategory;
use App\Models\SpaImage;
use App\Models\SpaSubCategory;
use Illuminate\Support\Str;

class SpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spas = Spa::all();
        return view('admin.spa.index')->with(compact('spas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spa_categories = SpaCategory::all();
        $spa_sub_categories = SpaSubCategory::all();
        return view('admin.spa.create')->with(compact('spa_categories', 'spa_sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Spa::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'spa_category_id' => $request->spa_category_id,
            'spa_sub_category_id' => $request->spa_sub_category_id,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        return redirect()->route('spa.index')->with('message', $request->title . ' created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spa = Spa::find($id);
        $spa_images = SpaImage::where('spa_id', $id)->get();
        return view('admin.spa-images.index')->with(compact('spa', 'spa_images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spa_categories = SpaCategory::all();
        $spa_sub_categories = SpaSubCategory::all();
        $spa = Spa::find($id);
        return view('admin.spa.edit')->with(compact('spa_categories', 'spa', 'spa_sub_categories'));
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
        $p = Spa::find($id);

        $p->title = $request->title;
        $p->slug = Str::slug($request->title);
        $p->excerpt = $request->excerpt;
        $p->description = $request->description;
        $p->spa_category_id = $request->spa_category_id;
        $p->spa_sub_category_id = $request->spa_sub_category_id;
        $p->price = $request->price;
        $p->status = $request->status;

        $p->save();

        return redirect()->route('spa.index')->with('message', $request->title . ' edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Spa::find($id);
        $p->delete();
        return redirect()->route('spa.index')->with('message', $p->title . ' deleted Successfully');
    }
}
