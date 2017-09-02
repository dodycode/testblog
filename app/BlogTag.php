<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class BlogTag extends Model
{
	protected $fillable = ['tag', 'deleted'];

    public function posts(){
    	return $this->belongsToMany('App\Post', 'blog_post_tag', 'post_id', 'tag_id');
    }
}
