<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;
use App\PostTag;
use Validator;


class PostController extends Controller
{
	public function __construct() {
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date = date("YmdHis", time());
	}

	/* Load danh sách các bài viết đã được đăng lên trang blog */

	public function adminIndex() {

		$posts = Post::where('status', 1)->orderBy('id', 'DESC')->get();
		$categories = Category::all();
		return view('admin/post/index',[
			'posts' => $posts,
			'categories' => $categories,
		]);
	}	

	/* Load danh sách các bài viết đang chờ được duyệt	 */
	// public function adminDraftPosts() {

	// 	$posts = Post::whereIn('status', [0,2])->orderBy('id','DESC')->get();

	// 	$categories = Category::all();

	// 	$tags = Tag::all();

	// 	return view('admin/posts/index',[
	// 		'posts' 	 => $posts,
	// 		'categories' => $categories,
	// 		'tags' 		 => $tags
	// 	]);
	// }

	/* Form thêm mới bài viết 	 */
	public function adminPostCreate() {
		// dd('jdhjvbgj');
		$categories = Category::all();
		return view('admin.post.create');
	}

	/* Lấy thông tin bài viết */	
	public function adminPostShow($id)
	{
		return Post::find($id);
	}


	/* Thêm mới bài viết và chờ duyệt */
	public function adminPostStore(Request $request)
	{

		if ($request->hasFile('thumbnail')) {
            # code...
			$request->validate([
				'title'         => 'required',
				'description'   => 'required',
				'content'       => 'required',
				'category_id'   => 'required',
				/*'user_id'       => 'required',*/
				// 'slug'          => 'required',
				'thumbnail'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$imageName= '/images/posts/'.time().'.'.$request->thumbnail->getClientOriginalExtension();

			$request->thumbnail->move(public_path('storage/app/images/posts'), $imageName);
		}else{
			$request->validate([
				'title'         => 'required',
				'description'   => 'required',
				'content'       => 'required',
				'category_id'   => 'required',
				'user_id'       => 'required',
				// 'slug'          => 'required',
			]);
			$imageName='/images/posts/userDefault.png';
		}

		$data=$request->all();
        //$data['user_id'] = Auth::user()->id;
		unset($data['thumbnail']);
        //unset($data['tags']);
		$data['thumbnail']=$imageName;
        $data['slug'] = str_slug($request->title);
		$data['user_id'] = Auth::user()->id;
		$result= Post::create($data);
		// return $result;
        return redirect()->back();
        // 
        /*$request->file->store('image/postThumbnails');
        dd($path);
        return Post::storeData($request->only(['name','thumbnail','description','content','slug','user_id','category_id']));*/
    }

    /* Duyệt bài viết */
	// public function adminDraftUpt(Request $request) {

	// 	$post_id = $request->all();

	// 	$post_id = $post_id['post_id'];

	// 	Post::find($post_id)->update(['status' => 1]);

	// 	return \Response::json([
	// 		'error' => false,
	// 		'message' => 'Đăng bài thành công'
	// 	]);
	// }

    /* Form chỉnh sửa bài viết */
    public function adminPostEdit($slug) {

    	$post = Post::where('slug',$slug)->first();

    	$categories = Category::all();

    	return view('admin.posts.edit',[
    		'post'=>$post,
    		'categories'=>$categories
    	]);
    }

    /* Lưu các chỉnh sửa bài viết */
    public function adminPostUpdate(Request $request) {

    	date_default_timezone_set("Asia/Ho_Chi_Minh");

    	$date = date("YmdHis", time());

    	$data = $request->all();

    	$rules = [
    		'title' => 'required',
    		'description' => 'required',
    		'content' => 'required',
    		'tags.*' => 'required',
    		'category_id' => 'required',
    		'thumbnail' => 'mimes:jpeg,png,jpg',
    	];

    	$messages = [
    		'title.required' => 'Tiêu đề không được bỏ trống!',
    		'description.required' => 'Mô tả không được bỏ trống!',
    		'content.required' => 'Nội dung không được bỏ trống!',
    		'tags.*.required' => 'Tags không được bỏ trống!',
    		'category_id.required' => 'Danh mục không được bỏ trống!',
    		'thumbnail.mimes' => 'Thumbnail phải là ảnh (jpg, jpeg, png)!',
    	];

    	$validator = Validator::make($data, $rules, $messages);

    	if ($validator->fails()) {

    		return redirect()->back()->withErrors($validator);
    	}

    	$data['user_id'] = \Auth::user()->id;

    	$data['slug'] = str_slug($data['title']);

    	if ($request->hasFile('thumbnail')) {

    		$extension = '.'.$data['thumbnail']->getClientOriginalExtension();

    		$file_name = md5($data['slug']).'_'. $date . $extension;

    		$data['thumbnail']->storeAs('upload/thumbnails',$file_name);

    		$data['thumbnail'] = 'upload/thumbnails/'.$file_name;
    	}

    	$id = $data['id'];

    	unset($data['id']);

    	$tags = $data['tags'];

    	unset($data['tags']);

    	$data['status'] = 2;

    	$post = Post::find($id);

    	$post->update($data);

    	$sync_tags = [];

    	foreach ($tags as $tag) {

    		$tag = trim(preg_replace('/\s+/', ' ', $tag));

    		$tag_id = Tag::where('slug',str_slug($tag))->first();

    		if (empty($tag_id)) {

    			$temp = [
    				'name' => $tag,
    				'slug' => str_slug($tag),
    			];

    			$tag_id = Tag::create($temp);

    		}
    		array_push($sync_tags, $tag_id->id);
    	}

    	$sync_tags = array_unique($sync_tags);

    	$post->tags()->sync($sync_tags);

    	session()->flash('msg', '<script type="text/javascript">toastr.success("Cập nhập bài viết thành công! Vui lòng chờ bài viết được kiểm duyệt.")</script>');

    	return redirect()->route('admin.posts.list');
    }

    /* Xóa bài viết	 */
    public function adminPostDelete($id) {
    	$post_tags = PostTag::where('post_id',$id)->get();
    	foreach ($post_tags as $post_tag) {
    		PostTag::find($post_tag['id'])->delete();
    	}
    	Post::destroy($id);

    	return \Response::json([]);
    }
}
