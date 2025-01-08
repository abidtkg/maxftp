<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebpageController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('id', 'DESC')->paginate(120);
        return view('web.index', compact('movies'));
    }

    public function home()
    {
        if(!Auth::check()) return redirect()->route('web.index');
        if(Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }else {
            return redirect()->route('web.index');
        }
    }

    public function movie_page($id)
    {
        $movie = Movie::findOrFail($id);
        return view('web.movie', compact('movie'));
    }
}
