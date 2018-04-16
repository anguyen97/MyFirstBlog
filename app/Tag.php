<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	protected $table = 'tags';

	protected $fillable = ['name', 'slug'];

    public function posts()
    {
    	return $this->belongsToMany('App\Post','post_tag');
    }

    /**
     * [updateData admin update tag]
     * @param  [type] $data [description]
     * @param  [type] $id   [description]
     * @return [type]       [description]
     */
    public static function updateData($data, $id)
    {
    	return Tag::find($id)->update($data);
    }

    /**
     * [deleteTag admin delete tag]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public static function deleteTag($id)
    {
    	return Tag::find($id)->delete();
    }
}

