<?php

namespace App;

use App\Comment;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
   protected $fillable = ['title','user_id','image','content','view'];
   use SoftDeletes;
   protected $dates = ['deleted_at'];


   public function comments()
   {
     return $this->hasMany(Comment::class);
   }

   public function user()
   {
     return $this->belongsTo(User::class);
   }
}
