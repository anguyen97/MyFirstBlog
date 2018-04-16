<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryRequest;
use Validator;

class CategoryController extends Controller
{

    public function __construct()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("YmdHis", time());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::getAll();
        return view('admin/category/list', ['categories'=> $categories]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {        
        $data = $request->all();

        $data['slug'] = str_slug($data['name']);

        $data['level'] += 1;

        $category = Category::insertData($data);

        return $category;        
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $data['slug'] = str_slug($data['name']);

        $data['level'] += 1;

        // console.log($data);
        // dd($data);         

        Category::updateData($data, $id);

        return Category::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $err = Category::deleteCate($id);  

        return response()->json([]);
    }
}
