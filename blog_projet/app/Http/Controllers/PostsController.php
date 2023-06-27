<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        return view('posts.index',['posts'=>Post::paginate(2)]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:1|max:255'
        ]);
        $post_id = $request->input('id');
        $post = Post::find($post_id);
        $comment = new Comment;
        $comment->post_id = $post->id;
        $comment->nom = 'user';
        $comment->email = fake()->email();
        $comment->commentaire = $request->input('content');
        $comment->save();
        // return redirect()->route('posts.index',['posts'=>Post::all()]);
        return redirect()->route('posts.show',['post'=>$post])->with('success', 'Comment added successsfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $commentaires = Comment::where('post_id',$post->id)->get();
        return view('posts.show', ['post' => $post, 'commentaires' => $commentaires]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
