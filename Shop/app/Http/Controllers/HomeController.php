<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Banner;
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
        $banner_slide = Banner::where('position', 1)->where('type', 1)->where('is_active', 1)->get();
        $banner_2 = Banner::where('position', 2)->where('type', 1)->where('is_active', 1)->get();
        $thumb = Banner::where('position', 3)->where('type', 1)->where('is_active', 1)->get();

        $first_hot_product = Product::where('is_hot', 1)->where('is_active', 1)->take(3)->get();
        $hot_product = Product::where('is_hot', 1)->where('is_active', 1)->skip(3)->take(24)->get();
        $article = Article::latest()->take(7)->get();

        $list = []; // chứa danh sách sản phẩm  theo danh mục

        foreach($this->category as $key => $parent) {
            if ($parent->parent_id == 0) { // check danh mục cha
                $ids = []; // tạo chứa các id của danh cha + danh mục con trực thuộc / danh mục con

                $ids[] = $parent->id; // id danh mục cha

                $sub_menu = [];
                foreach ($this->category as $child) {
                    if ($child->parent_id == $parent->id) {
                        $sub_menu[] = $child;
                        $ids[] = $child->id; // thêm phần tử vào mảng
                    }
                } // ids = [1,7,8,9,..]

                $list[$key]['category'] = $parent; // điện thoại, tablet
                $list[$key]['sub_category'] = $sub_menu; // điện thoại, tablet

                // SELECT * FROM `products` WHERE is_active = 1 AND is_hot = 0 AND category_id IN (1,7,9,11) ORDER BY id DESC LIMIT 10
                $list[$key]['products'] = Product::where(['is_active' => 1, 'is_hot' => 0])
                    ->whereIn('category_id', $ids)
                    ->limit(8)
                    ->orderBy('id', 'desc')
                    ->get();


            }
        }

        return view('frontend.client.shop')->with('banner_slide', $banner_slide)->with('banner_2', $banner_2)->with('thumb', $thumb)->with('hot_product', $hot_product)->with('first_hot_product', $first_hot_product)->with('article', $article)->with('list', $list);
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
    public function shop()
    {

        return view('frontend.client.shop');
    }
}
