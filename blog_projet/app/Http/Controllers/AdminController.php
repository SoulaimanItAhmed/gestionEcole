<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index',['posts'=>Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $request->all();
        $path = $request->file('image')->store('public/images');
        $post['image'] = explode("/", $path)[2];
        Post::create($post);
        // return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $admin)
    {
        return view('admin.edit',['admin'=>$admin]);
    }

    /**b
     * Update the specified resource in storage.
     */
    public function update(Request $request,Post $admin)
    {
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
        ]);

        $admin=Post::find($request->hidden_id);
        $admin->titre = $request->titre;
        $admin->contenu = $request->contenu;
        $admin->user_id = $request->user_id;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $filename);
            $admin->image = $filename;
        
        }else{
            $admin->image = $request->hidden_image;
        }

        $admin->save();
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index');
    }
}
