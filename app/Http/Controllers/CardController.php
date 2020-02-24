<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;

class CardController extends Controller
{
    public function index(CV $cv) {
    	return view('cv', ['cv'=>$cv]);
    }

    public function create(CV $cv) {
    	//
    }

    public function update(CV $cv) {
    	//
    }

    public function delete(CV $cv) {
    	//
    }

    public function check(CV $cv) {
    	//
    }

    public function premium(CV $cv) {
    	//
    }
    public function manager(CV $cv) {
    	//
    }
}
