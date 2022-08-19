<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Article;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        View::share('setting', $setting);

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
}
