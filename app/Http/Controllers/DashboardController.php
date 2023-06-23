<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $title;

    public function index()
    {
        $this->title = "Dashboard";
        return view('admin.dashboard.index',['title'=>$this->title]);
    }
}
