<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Banner;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        $dataCate = Category::all();
        return view('backend.article.index', ['data' => $data], ['dataCate' => $dataCate]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = article::all();
        $dataCate = Category::all();
        return view('backend.article.create',  ['data' => $data], ['dataCate' => $dataCate]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $article = new article();
        $article->title = $request->input('title');
        $article->url = $request->input('url');

        $article->slug = Str::slug($request->input('title'));


        $article->image = $request->input('image');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/article/';
            $file->move($path_upload,$filename);
            $article->image = $path_upload.$filename;

        }

        $article->created_at = Carbon::now();

        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->meta_title = $request->input('meta_title');
        $article->meta_description = $request->input('meta_description');


        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $article->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $article->is_active = $is_active;


        $article->save();
        return redirect()->route('article.index');
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
        $data = Article::all();
        $dataCate = Category::all();
        $dataCateFail = Category::findOrFail($id);
        $model = Article::findOrFail($id);


        return view('backend.article.edit', [
            'model' => $model,
            'data' => $data,
            'dataCate' => $dataCate,
            'dataCateFail'=>$dataCateFail
        ]);
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



        $article = article::findOrFail($id);
        $article->title = $request->input('title');
        $article->url = $request->input('url');

        // @(app_path($article->image));
        $article->image = $request->input('image');
        if($request->hasFile('image'))
        {


            @unlink(public_path($article->image));


            $file = $request->file('image');
            $random = Str::random(5);
            $filename= $random.'_'.time().'_'.$file->getClientOriginalName();
            $path_upload= 'public/upload/article/';
            $file->move($path_upload,$filename);
            $article->image = $path_upload.$filename;

        }

        $article->updated_at = Carbon::now();
        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->meta_title = $request->input('meta_title');
        $article->meta_description = $request->input('meta_description');


        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $article->position =  $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $article->is_active = $is_active;
        

        $article->save();
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $article = article::findOrFail($id);
        // xóa ảnh cũ
        @unlink(public_path($article->image));

        article::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }
}
