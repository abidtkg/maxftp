<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try{
            Category::create([
                'name' => $request->name
            ]);

            return back()->with('success', 'Category has created!');
        }catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        
        try{
            $category->delete();
            return back()->with('success', 'Category has deleted!');
        }catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
        }
    }
}
