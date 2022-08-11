<?php

namespace App\Http\Controllers;

use App\Models\vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = vendor::all();
        return view('backend.vendor.index', ['data' => $data]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = vendor::all();
        return view('backend.vendor.create', ['data' => $data]);

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

            'position' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            //'target' => 'required',
            //'description' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên',

            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'position.required' => 'Bạn cần phải nhập vị trí',
            //'target.required' => 'Bạn cần phải target',
            //'description.required' => 'Bạn cần phải nhập vào mô tả',
        ]);

        $vendor = new vendor();
        $vendor->name = $request->input('name');
        $vendor->slug = Str::slug($request->input('name'));
        $vendor->email = $request->input('email');
        $vendor->phone = $request->input('phone');
        $vendor->website = $request->input('website');
        $vendor->address = $request->input('address');


        $vendor->image = $request->input('image');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/vendor/';
            $file->move($path_upload,$filename);
            $vendor->image = $path_upload.$filename;

        }




        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $vendor->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $vendor->is_active = $is_active;


        $vendor->save();
        return redirect()->route('vendor.index');
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
        $data = vendor::all();
        $model = vendor::findOrFail($id);
        return view('backend.vendor.edit', ['model' => $model],['data' => $data]);
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



        $vendor = vendor::findOrFail($id);
        $vendor->name = $request->input('name');
        $vendor->slug = Str::slug($request->input('name'));
        $vendor->email = $request->input('email');
        $vendor->phone = $request->input('phone');
        $vendor->website = $request->input('website');
        $vendor->address = $request->input('address');

        // @(app_path($vendor->image));

        if($request->hasFile('image'))
        {

            $vendor->image = $request->input('image');
            @unlink(public_path($vendor->image));


            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/vendor/';
            $file->move($path_upload,$filename);
            $vendor->image = $path_upload.$filename;

        }



        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $vendor->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $vendor->is_active = $is_active;


        $vendor->save();
        return redirect()->route('vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $vendor = vendor::findOrFail($id);
        // xóa ảnh cũ
        @unlink(public_path($vendor->image));

        vendor::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }
}
