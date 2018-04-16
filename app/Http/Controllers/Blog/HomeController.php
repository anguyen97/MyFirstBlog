<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class HomeController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("YmdHis", time());
    }

    /**
     * [about display all information about NGUYEN TRUNG ANH]
     * @return [type] [description]
     */
    public function about()
    {
        return view('blog.about.index');
        // return view('blog.testMenus');
    }

    /**
     * [index home]
     * @return [type] [description]
     */
    public function index()
    {
    	$posts = Post::paginate(7);
        $recent_posts = Post::orderBy('created_at')->get();
        // dd($recent_posts);
        $categories = Category::all();
        $category_hightlights = Category::where('id','<=2')->get();
        $tag_hightlights = Tag::where('id','<=2')->get();

    	return view('blog.index',[
            'posts'=>$posts, 
            'recent_posts' => $recent_posts, 
            'categories' => $categories,
            'category_hightlights' => $category_hightlights,
            'tag_hightlights' => $tag_hightlights,

        ]);
    }

    /**
     * [blogPostShow display blog content->list post]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function blogPostShow($slug)
    {
        $post = Post::where('slug', $slug)->get();
        return view('blog.page.pagecontent', ['post' => $post]);
    }


}
