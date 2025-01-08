<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('admin.movie.index');
    }

    public function create()
    {
        return view('admin.movie.create');
    }

    public function store(Request $request)
    {
        return $request;
    }
}
