<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; 

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comment.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'article_id' => 'required', // Menambahkan validasi article_id
        ]);
    
        Comment::create([
            'name' => $request->name,
            'content' => $request->content,
            'article_id' => $request->article_id, // Menyimpan article_id
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }
}