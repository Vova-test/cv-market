<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;

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
        $cv = CV::select([
            "id", 
            "first_name",
            "last_name",
            "profession",
            "salary",
            "valute",
            "age", 
            "city",
            "education",
            "schedule",
            "created_at"
        ])->orderBy('created_at', 'desc')->get();
        return view('home', ['cv'=>$cv]);
    }
}
