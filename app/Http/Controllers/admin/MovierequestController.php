<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RequestMovie;
use Exception;
use Illuminate\Http\Request;

class MovierequestController extends Controller
{
    public function index()
    {
        $requests = RequestMovie::orderBy('created_at', 'DESC')->paginate(50);
        return view('admin.request.index', compact('requests'));
    }

    public function delete($id)
    {
        $moviereq = RequestMovie::findOrFail($id);

        try{
            $moviereq->delete();
            return back()->with('success', 'Request has deleted!');
        }catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function approve($id)
    {
        $moviereq = RequestMovie::findOrFail($id);

        try{
            $moviereq->update(['done' => true]);
            return back()->with('success', 'Request has approved!');
        }catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
        }
    }
}
