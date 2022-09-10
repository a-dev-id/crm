<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Page;
use App\Models\PostImage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        return view('admin.post.create')->with(compact('pages'));
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
            $banner_image = $request->file('banner_image')->store('images/post/banner', 'public');
        }

        Post::create([
            'page_id' => $request->page_id,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'excerpt' => $request->excerpt,
            'banner_image' => $banner_image,
            'button_title' => $request->button_title,
            'button_url' => $request->button_url,
            'status' => $request->status,
        ]);

        return redirect()->route('post.index')->with('message', $request->title . ' created Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $post_images = PostImage::where('post_id', $id)->get();
        return view('admin.post-images.index')->with(compact('post', 'post_images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $pages = Page::all();
        $post = Post::find($id);
        return view('admin.post.edit')->with(compact('post', 'pages'));
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
            $banner_image = $request->file('banner_image')->store('images/post/banner', 'public');
        }

        $p = Post::find($id);

        $p->title = $request->title;
        $p->sub_title = $request->sub_title;
        $p->slug = Str::slug($request->title);
        $p->description = $request->description;
        $p->excerpt = $request->excerpt;
        $p->banner_image = $banner_image;
        $p->button_title = $request->button_title;
        $p->button_url = $request->button_url;
        $p->status = $request->status;

        $p->save();

        return redirect()->route('post.index')->with('message', $request->title . ' edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Post::find($id);
        $p->delete();
        return redirect()->route('post.index')->with('message', $p->title . ' deleted Successfully');
    }
}
