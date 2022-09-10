<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = Setting::find($id);
        return view('admin.setting.index')->with(compact('setting'));
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
        $p = Setting::find($id);

        if (empty($request->file('gofood_logo'))) {
            $gofood_logo = $request->old_gofood_logo;
        } else {
            $gofood_logo = $request->file('gofood_logo')->store('images/setting', 'public');
        }

        if (empty($request->file('gofood_banner'))) {
            $gofood_banner = $request->old_gofood_banner;
        } else {
            $gofood_banner = $request->file('gofood_banner')->store('images/setting', 'public');
        }

        $p->gofood_title = $request->gofood_title;
        $p->gofood_logo = $gofood_logo;
        $p->gofood_description = $request->gofood_description;
        $p->gofood_button_text = $request->gofood_button_text;
        $p->gofood_button_link = $request->gofood_button_link;
        $p->gofood_banner = $gofood_banner;
        $p->gofood_banner_link = $request->gofood_banner_link;
        $p->news_informations_title = $request->news_informations_title;
        $p->news_informations_description = $request->news_informations_description;
        $p->homepage_video_url = $request->homepage_video_url;
        $p->instagram_url = $request->instagram_url;
        $p->facebook_url = $request->facebook_url;
        $p->tripadvisor_url = $request->tripadvisor_url;
        $p->youtube_url = $request->youtube_url;
        $p->google_url = $request->google_url;
        $p->spa_service_excerpt = $request->spa_service_excerpt;
        $p->spa_service_description = $request->spa_service_description;

        $p->save();

        return redirect()->route('setting.show', [$id])->with('message', 'Setting Updated Successfully');
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
