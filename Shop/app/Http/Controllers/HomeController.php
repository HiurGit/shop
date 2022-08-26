<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brands;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $category =Category::where(['is_active'=>1])->get();
        $setting = Setting::first();
        View::share('setting', $setting);
        View::share('category', $category);

    }
    public function index(){

        return view('frontend.client.home');
    }
    public function intro(){

        return view('frontend.client.intro');
    }
    public function  tintuc(){
        $article = Article::latest()->paginate(10);
        return view('frontend.client.tintuc')->with('article', $article);
    }
    public function  detailTintuc($slug){
        $article = Article::where('slug',$slug)->where('is_active',1)->first();

        return view('frontend.client.detailTintuc')->with('article', $article);
    }

      public function category_product($slug){
        
        return view('frontend.client.product');
    }
      public function products(){

            $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as cate')
            ->paginate(30);

        return view('frontend.client.product')->with('products', $products);
    }


}
