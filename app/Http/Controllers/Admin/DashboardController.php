<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class DashboardController extends MainController
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
