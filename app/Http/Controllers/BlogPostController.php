<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App\Post;
use App\Comment;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blogposts.index',['blogposts'=>Post::paginate(15)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogposts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {

        $file = $request->file('image');

        $file_name = uniqid().'_'.$request->image->getClientOriginalName();

        $file->move(public_path().'/image/author/',$file_name);

        Post::create(['title'=>$request->title,'user_id'=>Auth::user()->id,'image'=>$file_name,'content'=>$request->content]);
        session()->flash('status', 'New post is announced.');

        return redirect()->route('blog-posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Post $model)
    {
      $comments  = $model::whereId($id)->first()->comments;

      Post::whereId($id)->where('id',$id)->update(['view'=>$model::find($id)->view + 1]);

      return view('blogposts.show',['post'=>$model::find($id)],compact('comments'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blogposts.edit',['post'=>Post::find($id)]);
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
      Post::where('id',$id)->update(['title'=>$request->title,'author'=>$request->author,'content'=>$request->content]);
      return redirect()->route('blog-posts.show',['blog_post'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogPost = Post::find($id);
        $blogPost->delete();
        session()->flash('status', 'Post id('.$id.')  is deleted .');
        return redirect()->route('blog-posts.index');
    }

    public function comment(Request $request)
    {
      //return $request;
      //$int2 = (int) $str;
      Comment::create(['post_id'=>$request->post_id,'comment'=>$request->comment,'user_id'=>Auth::user()->id]);

      return redirect()->route('blog-posts.show',$request->post_id);
    }
}
