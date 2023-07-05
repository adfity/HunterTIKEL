<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class WelcomeController extends Controller
{
    //
    public function index(){
        $articles = Article::orderBy('id', 'DESC')->paginate(5);
        return view ('welcome',compact('articles'));
    }
}
