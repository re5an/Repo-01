<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::latest()->paginate(10);
//        dd($posts);
        return view("posts.paginatedIndex", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $validatedData = $request->validate([
        $this->validate($request,[
        	'title' => 'required|max:255',
	        'body' => 'required|min:1'
        ]);

        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = Auth::id();
        $post->save();

        return back()->with('status', 'Post is Saved!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
        	'title'=>'required',
        	'body'=>'required',
        ]);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $post->user_id;
        $post->save();

        return redirect()->route('userPosts', Auth::id())->with('status', 'Post is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        
        return back()->with('status', 'Post is Deleted');
    }

	public function storeComment( Request $request, $Id )
	{
		$post = Post::findorFail($Id);
		$post->comments()->create([
			'name' => $request->name,
			'body' => $request->body,
			'post_id' => $request->post_id,
//			'post_id' => $Id,
		]);
		$post->save();
		return back();
    }

	public function userPosts(  ) {
		$posts =  Post::latest()->where('user_id', Auth::id())->paginate(10);
//        dd($posts);
		return view("posts.user_posts", compact('posts'));
    }
}
