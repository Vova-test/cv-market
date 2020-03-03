<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show(Request $request)
    {   
        if (!isset($request['page'])) {
            $request['page'] = 1;
        }
        
        $check = 1;

        if (Auth::check() && Auth::user()->type == User::MANAGER_TYPE) {
            $check = $request['checked']; 
        }
        $cv = CV::select([
            "id", 
            "first_name",
            "last_name",
            "profession",
            "salary",
            "currency",
            "age", 
            "city",
            "education",
            "schedule",
            "created_at",
            "image_link"
        ]);

        $cv = $cv->where('checked', $check);

        if (!empty($check)) {            
            $cv = $cv->orderBy('created_at', 'desc');    
        }

        return response()->json([
            'cvs' => $cv->paginate(10),
            'checked' => $check
        ]);
    }
}
