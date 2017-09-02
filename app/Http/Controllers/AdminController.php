<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\BlogTag;
use App\BlogCategory;
use App\Post;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Str;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('admin.dashboard');
    }

    //Tags
    public function tags(){
    	$tags = BlogTag::where('deleted', '0')->count();
    	return view('admin.tags.index')
    	->with('tags', $tags);
    }

    public function ajaxTag(){
    	$tags = BlogTag::select('id')->get();

    	return Datatables::eloquent(BlogTag::where('deleted', '0'))
        ->addColumn('action', function($tags) {
            return '
            <small>
            <a href="/admin/tags/edit/'. $tags->id .'" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="/admin/tags/hapus/'. $tags->id .'" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
            </small>
            ';
        })
        ->make(true);
    }

    public function addTag(){
    	return view('admin.tags.add');
    }

    public function storeTag(Request $request){
    	$this->validate($request,
    	[
    		'tag' => 'required'
    	]);

    	$tag = $request->all();
    	$execute = BlogTag::create($tag);

    	return redirect()->to('/admin/tags');
    }

    public function editTag($id){
    	$tag = BlogTag::find($id);

    	return view('admin.tags.edit')
    	->with('tag', $tag);
    }

    public function storeEditedTag(Request $request, $id){
    	$this->validate($request,
    	[
    		'tag' => 'required'
    	]);

    	$tag = $request->all();
    	$execute = BlogTag::find($id)->update($tag);

    	return redirect()->to('/admin/tags');
    }

    public function deleteTag($id){
    	$tag = ['deleted' => '1'];
    	$execute = BlogTag::find($id)->update($tag);

    	return redirect()->to('/admin/tags');
    }

    //Category
    public function categories(){
    	$categories = BlogCategory::where('deleted', '0')->count();

    	return view('admin.categories.index')
    	->with('categories', $categories);
    }

    public function ajaxCategory(){
    	$categories = BlogCategory::select('id')->get();

    	return Datatables::eloquent(BlogCategory::where('deleted', '0'))
        ->addColumn('action', function($categories) {
            return '
            <small>
            <a href="/admin/categories/edit/'. $categories->id .'" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="/admin/categories/hapus/'. $categories->id .'" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
            </small>
            ';
        })
        ->make(true);
    }

    public function addCategory(){
    	return view('admin.categories.add');
    }

    public function storeCategory(Request $request){
    	$this->validate($request,
    	[
    		'category' => 'required'
    	]);

    	$category = $request->all();
    	$execute = BlogCategory::create($category);

    	return redirect()->to('/admin/categories');
    }

    public function editCategory($id){
    	$category = BlogCategory::find($id);

    	return view('admin.categories.edit')
    	->with('category', $category);
    }

    public function storeEditedCategory(Request $request, $id){
    	$this->validate($request,
    	[
    		'category' => 'required'
    	]);

    	$category = $request->all();

    	$execute = BlogCategory::find($id)->update($category);

    	return redirect()->to('/admin/categories');
    }

    public function deleteCategory($id){
    	$category = ['deleted' => '1'];

    	$execute = BlogCategory::find($id)->update($category);

    	return redirect()->to('/admin/categories');
    }

    //Posts
    public function posts(){
    	$posts = Post::where('deleted', '0')->count();
    	$categories = BlogCategory::where('deleted', '0')->count();
    	$tags = BlogTag::where('deleted', '0')->count();

    	return view('admin.posts.index')
    	->with('posts', $posts)
    	->with('categories', $categories)
    	->with('tags', $tags);
    }

    public function ajaxPost(){
    	$posts = Post::select('id','slug')->get();

    	$id_kategori = Post::select('category_id')->first();

    	$kategori = Post::find($id_kategori->category_id);

    	return Datatables::eloquent(Post::where('deleted', '0'))
    	->addColumn('category', function($kategori){
    		return $kategori->namaKategori->category;
    	})
        ->addColumn('action', function($posts) {
            return '
            <small>
            <a href="/read/'. $posts->slug .'" class="btn btn-default btn-sm" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a>
            <a href="/admin/posts/edit/'. $posts->id .'" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="/admin/posts/hapus/'. $posts->id .'" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
            </small>
            ';
        })
        ->make(true);
    }

    public function addPost(){
    	$tags = BlogTag::where('deleted', '0')->get();
    	$categories = BlogCategory::where('deleted', '0')->get();

    	return view('admin.posts.add')
    	->with('tags', $tags)
    	->with('categories', $categories);
    }

    public function storePost(Request $request){
    	$this->validate($request,
    	[
    		'title' => 'required',
    		'content' => 'required',
    		'category_id' => 'required',
    		'tag_id' => 'required'
    	]);

    	if ($request->hasFile('image')){
    		//atur gambar
    		$file = $request->file('image');
    		$extension = $file->getClientOriginalExtension();
    		$namabaru = Str::slug($request->input('title')); //dari judul post, di selipin setrip -  tiap spasi di namanya
    		$renameGambar = "$namabaru.$extension";
    		$file->move("img/", $renameGambar);

    		//slug link post
    		$slug = Str::slug($request->input('title'));

    		//masukan ke array
    		$post = [
    			'slug' => $slug,
    			'title' => $request->input('title'),
    			'content' => $request->input('content'),
    			'category_id' => $request->get('category_id'),
    			'image' => $renameGambar
    		];
    	}else{
    		//slug link post
    		$slug = Str::slug($request->input('title'));

    		//masukan ke array
    		$post = [
    			'slug' => $slug,
    			'title' => $request->input('title'),
    			'content' => $request->input('content'),
    			'category_id' => $request->get('category_id'),
    			'image' => null
    		];
    	}

    	$execute = Post::create($post);

    	//cari id post
    	$post_id = Post::find($execute->id);

    	//kirim ke table blog_tag_post bersama dgn tag_id nya
    	$post_id->tags()->sync($request->get('tag_id'));

    	return redirect()->to('/admin/posts');
    }

    public function editPost($id){
    	$post = Post::find($id);
    	$tags = BlogTag::where('deleted', '0')->get();
    	$categories = BlogCategory::where('deleted', '0')->get();

    	return view('admin.posts.edit')
    	->with('post', $post)
    	->with('tags', $tags)
    	->with('categories', $categories);
    }

    public function storeEditedPost(Request $request, $id){
    	$this->validate($request,
    	[
    		'title' => 'required',
    		'content' => 'required',
    		'category_id' => 'required',
    	]);

    	if ($request->hasFile('image')){
    		//atur gambar
    		$file = $request->file('image');
    		$extension = $file->getClientOriginalExtension();
    		$namabaru = Str::slug($request->input('title')); //dari judul post, di selipin setrip -  tiap spasi di namanya
    		$renameGambar = "$namabaru.$extension";
    		$file->move("img/", $renameGambar);

    		//slug link post
    		$slug = Str::slug($request->input('title'));

    		//masukan ke array
    		$post = [
    			'slug' => $slug,
    			'title' => $request->input('title'),
    			'content' => $request->input('content'),
    			'category_id' => $request->get('category_id'),
    			'image' => $renameGambar
    		];
    	}else{
    		//slug link post
    		$slug = Str::slug($request->input('title'));

    		//masukan ke array
    		$post = [
    			'slug' => $slug,
    			'title' => $request->input('title'),
    			'content' => $request->input('content'),
    			'category_id' => $request->get('category_id'),
    		];
    	}

    	$execute = Post::find($id)->update($post);

    	return redirect()->to('/admin/posts');
    }

    public function deletePost($id){
    	$post = ['deleted' => '1'];
    	$execute = Post::find($id)->update($post);

    	return redirect()->to('/admin/posts');
    }
}
