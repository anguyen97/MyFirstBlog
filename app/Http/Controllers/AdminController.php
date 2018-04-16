<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function __construct() {
    	$this->middleware('admin',['except' => 'getLogout']);
    }

    public function getIndex()
    {
    	// return "Admin - home";
        return view('admin.index'); 
    }

    public function getLogout() {
    	Auth::guard('admin')->logout();
    	return redirect('admin/login');
    }
}
