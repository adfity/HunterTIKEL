<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class HomeController extends Controller
{
    //
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(5);
        return view('home',compact('articles'));;
    }
}
