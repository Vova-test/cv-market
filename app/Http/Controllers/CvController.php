<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;

class CvController extends Controller
{
    public function index(CV $cv) {
    	return view('cv', ['cv'=>$cv]);
    }

    public function showCreatePage(CV $cv) {
    	return view('card');
    }

    public function create(CV $cv) {
    	//return view('card');
    }

    public function update(CV $cv) {
    	//return view('card', ['cv'=>$cv]);
    }

    public function showUpdatePage(CV $cv) {
    	return view('card', ['cv'=>$cv]);
    }

    public function delete(CV $cv) {
    	$cv->delete();
    	return redirect()->route('home');
    }

    public function check(CV $cv) {
    	$cv->checked = 1;
    	$cv->save();
    	return redirect()->route('home');
    }

    public function premium(CV $cv) {
    	//
    }
    public function manager(CV $cv) {
    	//
    }
}
