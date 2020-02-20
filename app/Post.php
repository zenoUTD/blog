<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = ['title','author','content','view'];

   public function comments()
   {
     return $this->hasMany(Comment::class);
   }
}
