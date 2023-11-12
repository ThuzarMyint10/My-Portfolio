<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create','store','edit','destroy','update']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', ['posts' => BlogPost::withCount('comments')->get()]);
    }
    
    public function show($id)
    {
        return view('posts.show', ['post' =>
                 BlogPost::with('comments')->findorFail($id)
                 ]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(StorePost $request){

        $validatedData = $request->validated();


        $blogpost = BlogPost::create($validatedData);
        $blogpost->save();

        $request->session()->flash('status', 'Blog post was created!');

        return redirect()->route('posts.show',['post'=> $blogpost->id ]);
    }
    public function edit($id){
        $post = BlogPost::findorFail($id);
        // if (Gate::denies('update-post', $post)){
        //     abort(403, "You can't edit this blogpost!");
        // };
        $this->authorize('update-post', $post);
        return view('posts.edit', ['post' => $post]);
    }
    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findorFail($id);
        // if (Gate::denies('update-post', $post)){
        //     abort(403, "You can't edit this blogpost!");
        // };
        $this->authorize('update-post', $post);
        $validatedData = $request->validated();
        $post->fill($validatedData);
        $post->save();
        $request->session()->flash('status', 'Blog post was updated!');
        return redirect()->route('posts.show',['post'=> $post->id ]);
    }
    public function destroy(Request $request, $id)
    {
        $post = BlogPost::findorFail($id);
        $this->authorize('delete-post', $post);
        $post->delete();
        $request->session()->flash('status', 'Blog post was deleted!');
        return redirect()->route('posts.index');


    }

}
