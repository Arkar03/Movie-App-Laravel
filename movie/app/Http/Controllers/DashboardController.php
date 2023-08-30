<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardShow()
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        } else {
            return 'not safe';
        }
    }
}
