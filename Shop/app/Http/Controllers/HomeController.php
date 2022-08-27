<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = Category::where(['is_active' => 1])->get();
        $setting = Setting::first();
        View::share('setting', $setting);
        View::share('category', $this->category);

    }
    public function index()
    {

        return view('frontend.client.home');
    }
    public function intro()
    {

        return view('frontend.client.intro');
    }
    public function tintuc()
    {
        $article = Article::latest()->paginate(10);
        return view('frontend.client.tintuc')->with('article', $article);
    }
    public function detailTintuc($slug)
    {
        $article = Article::where('slug', $slug)->where('is_active', 1)->first();

        return view('frontend.client.detailTintuc')->with('article', $article);
    }

    public function products()
    {

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as cate')
            ->paginate(30);
            $products_last =  Product::where('is_active', 1)
            ->latest()
            ->paginate(10);
        return view('frontend.client.product')->with('products', $products)->with('products_last', $products_last);
    }

    public function category_product($slug)
    {

        $categorys = Category::where('slug', $slug)->where('is_active', 1)->first();

        $ids[] = $categorys->id; //khai báo mảng cho mã danh mục cần tìm chứa các sản phẩm
        $child_category = [];
        foreach ($this->category as $child) {
            if ($child->parent_id == $categorys->id) {
                $ids[] = $child->id; //thêm id của các danh mục cao vào mảng
                foreach ($this->category as $sub_child) {
                    if ($sub_child->parent_id == $child->id) {
                        $ids[] = $child->id; //thêm id của các danh mục cao vào mảng
                    }
                }
            }
        }


        $products = Product::where('is_active', 1)
                            ->whereIn('category_id',$ids)
                            ->latest()
                            ->paginate(10);
        $products_last =  Product::where('is_active', 1)

                            ->latest()
                            ->paginate(10);
        return view('frontend.client.category_product')->with('categorys', $categorys)->with('products', $products)->with('products_last', $products_last);
    }
    public function detailSanpham($slug)
    {
        $detail_product = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name as cate')
        ->where('products.slug', $slug)
        ->where('products.is_active', 1)
        ->first();
        // $detail_product = Product::where('slug', $slug)->where('is_active', 1)->first();


        return view('frontend.client.detail_product')->with('detail_product', $detail_product);
    }

}
