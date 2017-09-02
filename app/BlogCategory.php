<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class BlogCategory extends Model
{
	protected $table = 'blog_category';
    protected $fillable = ['category', 'deleted'];

    public function posts(){
    	return $this->hasMany('App\Post', 'category_id');
    }
}
