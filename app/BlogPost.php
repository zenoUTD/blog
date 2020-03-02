<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
   //protected $table = "posts";


   protected $fillable = ['title','author','content','view'];

   public function comments()
   {
     return $this->hasMany(Comment::class);
   }
}
