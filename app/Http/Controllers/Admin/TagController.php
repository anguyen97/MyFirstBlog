<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{

	/**
	 * [indexx show list tag]
	 * @return [type] [description]
	 */
    public function adminIndex()
    {
    	$tags = Tag::all();
    	return view('admin.tags.index')->withTags($tags);
    }

    /**
     * [adminTagStore save new tag to db]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function adminTagStore(Request $request)
    {
    	$rules = array([
    		'name' => 'required|min:3|max:15',
    	]);

    	$message = array([
    		'required' => 'The :attribute is required',
    		'min' => 'The :attribute must have at least :min',
    		'max' => 'The :attribute length is not bigger than :max'
    	]);

    	$this->validate($request, $rules, $message);

    	$tag  = new Tag;
    	$tag->name = $request->name;
    	$tag->slug = str_slug($request->name);
    	$tag->save();

    	$request->session()->flash('success', 'New tag was successfully create');

    	return $tag;
    }

    /**
     * [adminTagShow get a tag information]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function adminTagShow($id)
    {
    	return Tag::find($id);
    }


    /**
     * [adminTagUpdate update tag]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function adminTagUpdate(Request $request, $id)
    {
    	$data = $request->all();

        $data['slug'] = str_slug($data['name']);

        Tag::updateData($data, $id);

        return Tag::find($id);
    }

    /**
     * [adminTagDelete delete tag has id]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function adminTagDelete($id)
    {
    	Tag::deleteTag($id);

    	return response()->json([]);
    }
}
