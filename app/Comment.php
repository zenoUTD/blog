<?php

namespace App;

use App\BlogPost;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','post_id'];

    public function post()
    {
      return $this->belongsTo(BlogPost::class);
    }
}
