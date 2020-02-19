<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;

class CvController extends Controller
{
    public function index(CV $cv) {
    	return view('cv', ['cv'=>$cv]);
    }
}
