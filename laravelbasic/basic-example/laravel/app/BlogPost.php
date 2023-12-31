<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['title', 'content'];
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public static function boot(){
        parent::boot();
        static::deleting(function(BlogPost $blogpost){
            $blogpost->comments()->delete();
        });
    }
}
