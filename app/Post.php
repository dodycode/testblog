<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BlogTag;
use App\BlogCategory;

class Post extends Model
{
    protected $fillable = ['slug', 'title', 'content', 'category_id', 'image', 'view_count' , 'deleted'];

    public function prevBlogPostUrl($id) {
        $blog = $this->where('id', '<', $id)->orderBy('id', 'desc')->first();

        return $blog ? $blog->url : '#';
    }

    public function nextBlogPostUrl($id) {
        $blog = $this->where('id', '>', $id)->orderBy('id', 'asc')->first();

        return $blog ? $blog->url : '#';
    }

    public function tags(){
    	return $this->belongsToMany('App\BlogTag', 'blog_post_tag', 'post_id', 'tag_id');
    }

    public function namaKategori(){
    	return $this->belongsTo('App\BlogCategory', 'category_id');
    }
}
