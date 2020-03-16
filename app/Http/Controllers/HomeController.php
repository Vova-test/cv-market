<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CvService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    const COUNT_CVS = 5;

    public function __construct(CvService $cv)
    {
        $this->cv = $cv;
    }

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
        
        $response = $this->cv->paginate([
            'check' => $check,
            'pagination' => self::COUNT_CVS,
            'page'  => $request['page']
        ]);

        return response()->json($response);
    }
}
