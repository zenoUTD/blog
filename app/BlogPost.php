<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
   protected $fillable = ['title','author','content','view'];
}
