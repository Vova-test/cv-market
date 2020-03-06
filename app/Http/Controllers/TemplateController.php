<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()
    {
        return view('template');
    }

    public function show(Request $request)
    {   
        
        return response()->json([]);
    }
}
