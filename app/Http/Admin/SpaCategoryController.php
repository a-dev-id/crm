<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SpaCategory;
use App\Models\SpaCategoryImage;
use Illuminate\Support\Str;

class SpaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spa_categories = SpaCategory::all();
        return view('admin.spa-category.index')->with(compact('spa_categories'));
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
        if (empty($request->file('banner_image'))) {
            $banner_image = null;
        } else {
            $banner_image = $request->file('banner_image')->store('images/spa/banner', 'public');
        }

        if (empty($request->file('icon'))) {
            $icon = null;
        } else {
            $icon = $request->file('icon')->store('images/spa/icon', 'public');
        }

        SpaCategory::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'banner_image' => $banner_image,
            'icon' => $icon,
            'status' => $request->status,
        ]);
        return redirect()->route('spa-category.index')->with('message', $request->title . ' created Successfully');
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
        $spa_category_images = SpaCategoryImage::where('spa_category_id', $id)->get();
        return view('admin.spa-category-images.index')->with(compact('spa_category', 'spa_category_images'));
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
        $spa_category = SpaCategory::find($id);
        return view('admin.spa-category.edit')->with(compact('spa_category', 'spa_categories'));
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
        if (empty($request->file('banner_image'))) {
            $banner_image = $request->old_banner_image;
        } else {
            $banner_image = $request->file('banner_image')->store('images/spa/banner', 'public');
        }

        if (empty($request->file('icon'))) {
            $icon = $request->old_icon;
        } else {
            $icon = $request->file('icon')->store('images/spa/icon', 'public');
        }

        $p = SpaCategory::find($id);

        $p->title = $request->title;
        $p->slug = Str::slug($request->title);
        $p->description = $request->description;
        $p->banner_image = $banner_image;
        $p->icon = $icon;
        $p->status = $request->status;

        $p->save();

        return redirect()->route('spa-category.index')->with('message', $request->title . ' edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = SpaCategory::find($id);
        $p->delete();
        return redirect()->route('spa-category.index')->with('message', $p->title . ' deleted Successfully');
    }
}
