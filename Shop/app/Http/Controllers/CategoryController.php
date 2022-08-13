<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $filter_type =   $params['filter_type'] ?? 2;
        if (Auth::user()->role_id==2) {
            if ($filter_type==1) {
                $data = Category::withTrashed()->latest()->paginate(10);
            }elseif ($filter_type==2) {
                $data = Category::latest()->paginate(10);
            }elseif ($filter_type==3) {
                $data = Category::onlyTrashed()->latest()->paginate(10);
            }
        }else{
            $data = Category::latest()->paginate(10);

        }



        return view('backend.category.index')->with('data', $data)->with('filter_type', $filter_type);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = category::all();
        return view('backend.category.create', ['data' => $data]);

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

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));


        $category->image = $request->input('image');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/category/';
            $file->move($path_upload,$filename);
            $category->image = $path_upload.$filename;

        }

        $category->parent_id = $request->input('parent_id');


        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $category->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $category->is_active = $is_active;


        $category->save();
        return redirect()->route('category.index');
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
        $data = category::all();
        $model = category::findOrFail($id);
        return view('backend.category.edit', ['model' => $model],['data' => $data]);
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



        $category = category::findOrFail($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));


        // @(app_path($category->image));
        $category->image = $request->input('image');
        if($request->hasFile('image'))
        {


            @unlink(public_path($category->image));


            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/category/';
            $file->move($path_upload,$filename);
            $category->image = $path_upload.$filename;

        }

        $category->parent_id = $request->input('parent_id');


        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $category->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $category->is_active = $is_active;


        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::findOrFail($id);

        $checkExitsProduct = Product::where('category_id',$id)->first();

        if($checkExitsProduct != null){
            return response()->json([
                'status' => false,
                'msg' => 'Xóa thất bại có tồn tại sản phẩm trong danh mục này!!!'
            ]);
        }

        // xóa ảnh cũ
        @unlink(public_path($category->image));

        category::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }
    public function restore(Request $request, $id)
    {

        $category = category::withTrashed()->findOrFail($id);
        $category->restore();

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);

        return view('backend.category.edit', ['model' => $model],['data' => $data]);
    }
}
