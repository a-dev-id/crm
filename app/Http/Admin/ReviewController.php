<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.index')->with(compact('reviews'));
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
        Review::create([
            'name' => $request->name,
            'star' => $request->star,
            'date' => $request->date,
            'comment' => $request->comment,
            'source' => $request->source,
            'status' => $request->status,
        ]);
        return redirect()->route('review.index')->with('message', $request->name . ' created Successfully');
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
        $review = Review::find($id);
        $reviews = Review::all();
        return view('admin.review.edit')->with(compact('reviews', 'review'));
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
        $p = Review::find($id);

        $p->name = $request->name;
        $p->star = $request->star;
        $p->date = $request->date;
        $p->comment = $request->comment;
        $p->source = $request->source;
        $p->status = $request->status;

        $p->save();

        return redirect()->route('review.index')->with('message', $request->name . ' edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Review::find($id);
        $p->delete();
        return redirect()->route('review.index')->with('message', $p->name . ' deleted Successfully');
    }
}
