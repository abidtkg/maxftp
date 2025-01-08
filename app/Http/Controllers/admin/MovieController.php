<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Exception;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'DESC')->paginate(100);
        return view('admin.movie.index', compact('movies'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.movie.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file',
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'quality' => 'nullable|string|max:255',
            'imdbid' => 'required|string|max:255',
        ]);


        if (!is_dir(public_path('uploads'))) {
            mkdir(public_path('uploads'), 0755, true); // Create the uploads directory with appropriate permissions
        }
        
        if ($request->hasFile('image')) {
            $extension = $request->image->getClientOriginalExtension();
            $imageName = uniqid() . '.' . $extension;
            $request->image->move(public_path('uploads'), $imageName);
        }

        try{
            Movie::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'image' => $imageName,
                'link' => $request->link,
                'quality' => $request->quality,
                'imdbid' => $request->imdbid
            ]);
            return redirect()->route('admin.movie.index')->with('success', 'Movie added success!');
        }catch(Exception $e){
            dd($e);
            return back()->with('error', 'Soemthing went wrong');
        }
    }

    public function delete($id)
    {
        $movie = Movie::findOrFail($id);

        if (file_exists(public_path('uploads/' . $movie->image))) {
            unlink(public_path('uploads/' . $movie->image));
        }

        try{
            $movie->delete();
            return back()->with('success', 'Movie has deleted!');
        }catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
        }
    }
}
