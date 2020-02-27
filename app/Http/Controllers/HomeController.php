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
    public function index(Request $request)
    {   
        $checked = 1;

        if (Auth::check() && Auth::user()->type == User::MANAGER_TYPE) {
            $checked = 0; 
        }

        if ($request->has('radio')) {
            $checked = $request->radio;            
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

        $cv = $cv->where('checked', $checked);

        if (!empty($checked)) {            
            $cv = $cv->orderBy('created_at', 'desc');    
        }

        return view('home', [
            'cvs' => $cv->paginate(10),
            'checked' => $checked
        ]);
        //get()
    }
}
