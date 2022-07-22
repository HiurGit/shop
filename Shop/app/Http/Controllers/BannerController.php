<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::all();
        return view('backend.banner.index', ['data' => $data]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'target' => 'required',
            'description' => 'required',
        ],[
            'title.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'target.required' => 'Bạn cần phải target',
            'description.required' => 'Bạn cần phải nhập vào mô tả',
        ]);

        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->slug = Str::slug($request->input('title'));
        $banner->url = $request->input('url');

        $banner->image = $request->input('image');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/banner/';
            $file->move($path_upload,$filename);
            $banner->image = $path_upload.$filename;

        }

        $banner->target = $request->input('target');
        $banner->description = $request->input('editor1');
        $banner->type = $request->input('type');


        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $banner->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $banner->is_active = $is_active;


        $banner->save();
        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Banner::findOrFail($id);
        return view('backend.banner.edit', ['model' => $model]);
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

        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'target' => 'required',
            'description' => 'required',
        ],[
            'title.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'target.required' => 'Bạn cần phải target',
            'description.required' => 'Bạn cần phải nhập vào mô tả',
        ]);

        $banner = Banner::findOrFail($id);
        $banner->title = $request->input('title');
        $banner->slug = Str::slug($request->input('title'));
        $banner->url = $request->input('url');

        // @(app_path($banner->image));
        $banner->image = $request->input('image');
        if($request->hasFile('image'))
        {


            @unlink(public_path($banner->image));


            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/banner/';
            $file->move($path_upload,$filename);
            $banner->image = $path_upload.$filename;

        }

        $banner->target = $request->input('target');
        $banner->description = $request->input('editor1');
        $banner->type = $request->input('type');


        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $banner->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $banner->is_active = $is_active;


        $banner->save();
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id);
    }
}
