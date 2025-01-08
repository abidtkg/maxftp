<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_movies = Movie::count();
        return view('admin.dashboard', compact('total_movies'));
    }
}
