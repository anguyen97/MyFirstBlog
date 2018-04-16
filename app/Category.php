<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';

	protected $fillable = ['description', 'parent_id', 'slug', 'name', 'level'];

	public static function __contruct()
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	/**
	 * [getAll lấy ra danh sách các danh mục]
	 * @return [type] [description]
	 */
    public static function getAll()
    {
    	return Category::orderBy('id','DESC')->get();
    }

    /**
     * [insertData thêm mới 1 danh mục vào DB]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function insertData($data)
    {
    	return Category::create($data);
    	// return Category::find($data['pa']);
    	// return thông tin sản phẩm;
    }

    /**
     * [deleteCate delete category has id = $id]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public static function deleteCate($id)
    {
        return Category::find($id)->delete();
    }

    /**
     * [updateData update category information]
     * @param  [type] $data [description]
     * @param  [type] $id   [category_id ]
     * @return [type]       [description]
     */
    public static function updateData($data, $id)
    {
        return Category::find($id)->update($data);
    }

}
