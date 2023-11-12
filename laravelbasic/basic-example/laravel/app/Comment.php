<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function blogPost()
    {
        // blog_post_id
        return $this->belongsTo('App\BlogPost');
    }
}
