<?php

namespace App\Http\Controllers;


use App\Role;

class AdminController extends Controller
{
    public function __construct()
    {
//        return $this->middleware('admin');
    }

    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        return view('admin.main');
    }
}
