<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Feature;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['feature'] = Feature::where('status', 1)->get();
        $data['article'] = Article::leftJoin('category','category.id','=','article.category')
            ->leftJoin('users','users.id','=','article.id_user')
            ->select('article.*','category.title as category','users.name as user')
            ->where('status',1)->orderBy('view','DESC')->take(3)->get();
        return view('home',$data);
    }
}
