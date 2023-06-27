<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('query');
    $articles = Post::where('titre', 'LIKE', "%$query%")
                    ->orWhere('contenu', 'LIKE', "%$query%")
                    ->get();
    $comments = Comment::where('commentaire', 'LIKE', "%$query%")->get();
    
    return view('search', compact('articles', 'comments', 'query'));
}

}
