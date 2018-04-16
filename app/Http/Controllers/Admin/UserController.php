<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\User;

class UserController extends Controller
{
	/**
	 * [adminIndex display view of list user]
	 * @return [type] [description]
	 */
	public function adminIndex()
	{
		return view('admin.users.index');
	}

	/**
	 * [datatablesListUser get list user and display into the table]
	 * @return [type] [description]
	 */
	public function getListUserDatatables()
	{
		return Datatables::of(User::query())
		->addColumn('action', function ($user) {
			return '<a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-user-id='.$user["id"].'></a><a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-user-id='.$user["id"].'></a><a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-user-id='.$user["id"].'></a>';
		})
		->make(true);
	}
}
