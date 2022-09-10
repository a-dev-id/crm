<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpaCategory;
use App\Models\SpaSubCategory;
use Illuminate\Http\Request;

class SpaSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        SpaSubCategory::create([
            'title' => $request->title,
            'spa_category_id' => $request->spa_category_id,
            'status' => $request->status,
        ]);
        return redirect()->route('spa-sub-category.show', [$request->spa_category_id])->with('message', $request->title . ' created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spa_category = SpaCategory::find($id);
        $spa_sub_categories = SpaSubCategory::where('spa_category_id', $id)->get();
        return view('admin.spa-sub-category.index')->with(compact('spa_category', 'spa_sub_categories'));
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
        $p = SpaSubCategory::find($id);
        $p->delete();
        return redirect()->route('spa-category.index')->with('message', 'Sub Category - '.$p->title . ' deleted Successfully');
    }
}
