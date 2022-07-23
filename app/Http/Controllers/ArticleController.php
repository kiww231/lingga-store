<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function detail($slug)
    {
        $data['result'] = Article::leftJoin('category','category.id','=','article.category')
            ->leftJoin('users','users.id','=','article.id_user')
            ->select('article.*','category.title as category','users.name as user')
            ->where('slug',$slug)->first();
        $data['category'] = Category::get();
        $data['recent'] = Article::leftJoin('category','category.id','=','article.category')
            ->leftJoin('users','users.id','=','article.id_user')
            ->select('article.*','category.title as category','users.name as user')
            ->where('status',1)->orderBy('view','DESC')->take(3)->get();
        return view('article.detail',$data);
    }
}
