<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class AuthorController extends Controller
{
    public function viewAll(User $model)
    {
      return view('authors.index',['authors'=>$model::paginate(9)]);
    }

    public function delete($id)
    {

      // $posts = Post::where('user_id','=',$id)->get();
      // for($i=0;$i<count($posts);$i++)
      // {
      //   Post::where('user_id','=',$posts[$i]->id)->update(['user_id',4]);
      // }

      User::find($id)->delete();

      return redirect()->route('authors');
    }
}
