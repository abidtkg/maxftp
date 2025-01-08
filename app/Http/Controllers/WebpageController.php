<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\RequestMovie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\call;

class WebpageController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('id', 'DESC')->paginate(120);
        $categories = Category::all();
        return view('web.index', compact('movies', 'categories'));
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

    public function request_movie_page()
    {
        return view('web.movie-request');
    }

    public function request_movie_store(Request $request)
    {
        $request->validate([
            'email' => 'nullable|string|max:255',
            'movie_name' => 'required|string|max:255',
            'imdb_id' => 'nullable|string|max:255'
        ]);

        try{
            RequestMovie::create([
                'email' => $request->email,
                'movie_name' => $request->movie_name,
                'imdb_id' => $request->imdb_id
            ]);
            return back()->with('success', 'Request sent!');
        }catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
        }
    }
}
