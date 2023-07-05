<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(5);
    return view('article.manage.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Category::orderBy('id', 'DESC')->get();
        return view('article.manage.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $fileName=time().'.'.$request->file->extension();
        $request->file('file')->storeAs('public',$fileName);
        $article = Article::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'file'=>$fileName,
        ]);
        



        return back()->with('success', 'Posting data sukses!1!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $comments = Comment::where('article_id', $id)->get(); // Mengambil data komentar berdasarkan ID artikel
    
        return view('article.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $article = Article::findOrFail($id);
        return view('article.manage.edit', compact('categories', 'article'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);
        if(\File::exists('storage/'.$article->file)){
            \File::delete('storage/'.$article->file);
        }
        $fileName = time().'.'.$request->file->extension();
        $request->file('file')->storeAs('public',$fileName);
        $article->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'file'=>$fileName,
        ]);
    
        return back()->with('success', 'Ubah data sukses!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article=Article::whereId($id)->first();
        if(\File::exists('storage/'.$article->file)){
            \File::delete('storage/'.$article->file);
        }
        Article::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }

}
