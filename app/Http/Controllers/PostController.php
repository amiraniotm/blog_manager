<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);

        return view('admin.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
          'title' => 'required|max:255',
          'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'body'  => 'required'
        ));

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = 'posted';
        $post->save();

        Session::flash('success','The blog post was succesfully saved!');

        return redirect()->route('admin.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Post::find($id);
      if ($request->input('slug') == $post->slug) {
        $this->validate($request,array(
        'title' => 'required|max:255',
        'body' => 'required'
      ));
    } else {
        $this->validate($request,array(
        'title' => 'required|max:255',
        'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
        'body' => 'required'
      ));
    }

      $post = Post::find($id);

      $post->title = $request->input('title');
      $post->slug = $request->input('slug');
      $post->body = $request->input('body');

      $post->save();

      Session::flash('success','The blog post was succesfully modified!');

      return redirect()->route('admin.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success','The post was successfully deleted');
        return redirect()->route('admin.index');

    }
}
