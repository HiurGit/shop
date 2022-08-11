<?php

namespace App\Http\Controllers;

use App\Models\brands;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class brandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = brands::all();
        return view('backend.brand.index', ['data' => $data]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = brands::all();
        return view('backend.brand.create', ['data' => $data]);

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
            'name' => 'required|max:255',
            'website' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            //'target' => 'required',
            //'description' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên',
            'website.required' => 'Bạn cần phải nhập vào Liên kết',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'position.required' => 'Bạn cần phải nhập vị trí',
            //'target.required' => 'Bạn cần phải target',
            //'description.required' => 'Bạn cần phải nhập vào mô tả',
        ]);

        $brands = new brands();
        $brands->name = $request->input('name');
        $brands->slug = Str::slug($request->input('name'));


        $brands->image = $request->input('image');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/brands/';
            $file->move($path_upload,$filename);
            $brands->image = $path_upload.$filename;

        }
        $brands->website = $request->input('website');

        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $brands->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $brands->is_active = $is_active;


        $brands->save();
        return redirect()->route('brand.index');
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
        $data = brands::all();
        $model = brands::findOrFail($id);
        return view('backend.brand.edit', ['model' => $model],['data' => $data]);
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



        $brands = brands::findOrFail($id);
        $brands->name = $request->input('name');
        $brands->slug = Str::slug($request->input('name'));


        // @(app_path($brands->image));
        $brands->image = $request->input('image');
        if($request->hasFile('image'))
        {


            @unlink(public_path($brands->image));


            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/brands/';
            $file->move($path_upload,$filename);
            $brands->image = $path_upload.$filename;

        }




        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $brands->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $brands->is_active = $is_active;


        $brands->save();
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $brands = brands::findOrFail($id);
        // xóa ảnh cũ
        @unlink(public_path($brands->image));

        brands::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }
}
