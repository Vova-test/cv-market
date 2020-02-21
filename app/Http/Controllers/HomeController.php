<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;
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

        if ($request->has('checked')) {
            $checked = $request->checked;
        } else {
            if (Auth::check() && Auth::user()->type ==='Manager') {
                $checked = 0; 
            }
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
            "created_at"
        ]);
        $cv = $cv->where('checked',$checked);
        if (!empty($checked)) {            
            $cv = $cv->orderBy('created_at', 'desc');    
        }

        $cv = $cv->get();

        return view('home', ['cvs'=>$cv,
            'checked'=>$checked
        ]);
    }
}
