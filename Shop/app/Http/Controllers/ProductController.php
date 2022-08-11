<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product::all();
        return view('backend.product.index', ['data' => $data]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();

        $category = Category::all();
        $brand = Brands::all();
        $vendor = Vendor::all();

        // return view('backend.product.create',['category' => $category],['product' => $product],['brand' => $brand],['vendor' => $vendor] );
        return view('backend.product.create')->with('category', $category)->with('product', $product)->with('vendor', $vendor)->with('brand', $brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $product = new product();
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));


        $product->image = $request->input('image');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/product/';
            $file->move($path_upload,$filename);
            $product->image = $path_upload.$filename;

        }

        $product->stock = $request->input('email');
        $product->price = $request->input('email');
        $product->sale = $request->input('email');
        $product->is_hot = $request->input('email');
        $product->views = $request->input('description');
        $product->category_id = $request->input('type');
        $product->brand_id = $request->input('type');
        $product->vendor_id = $request->input('type');
        $product->url = $request->input('type');
        $product->sku = $request->input('type');
        $product->color = $request->input('type');
        $product->memory = $request->input('type');
        $product->summary = $request->input('type');
        $product->description = $request->input('type');
        $product->meta_title = $request->input('type');
        $product->meta_description = $request->input('type');


        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $product->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $product->is_active = $is_active;


        $product->save();
        return redirect()->route('product.index');
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
        $product = Product::all();
        $model = product::findOrFail($id);
        $category = Category::all();
        $brand = Brands::all();
        $vendor = Vendor::all();

        // return view('backend.product.create',['category' => $category],['product' => $product],['brand' => $brand],['vendor' => $vendor] );
        return view('backend.product.create')->with('model', $model)->with('category', $category)->with('product', $product)->with('vendor', $vendor)->with('brand', $brand);


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



        $product = product::findOrFail($id);
        $product->title = $request->input('title');
        $product->slug = Str::slug($request->input('title'));
        $product->url = $request->input('url');

        // @(app_path($product->image));
        $product->image = $request->input('image');
        if($request->hasFile('image'))
        {


            @unlink(public_path($product->image));


            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/product/';
            $file->move($path_upload,$filename);
            $product->image = $path_upload.$filename;

        }

        $product->target = $request->input('target');
        $product->description = $request->input('editor1');
        $product->type = $request->input('type');


        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $product->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $product->is_active = $is_active;


        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = product::findOrFail($id);
        // xóa ảnh cũ
        @unlink(public_path($product->image));

        product::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }
}
