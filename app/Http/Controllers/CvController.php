<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CvRequest;

class CvController extends Controller
{
    public function index(CV $cv) 
    {
    	return view('cv', ['cv' => $cv]);
    }

    public function showCreatePage(CV $cv) 
    {
    	return view('card', [
    		'nameRoute' => 'createCV',
    		'cvs' => []
    	]);
    }

    public function create(CvRequest $request) 
    {
    	$validated = $request->validated();

        $cv = new CV;

        $cv->first_name = $request->firstName;
        $cv->last_name = $request->lastName;
        $cv->profession = $request->profession;
        $cv->salary = $request->salary;
        $cv->currency = $request->currency;
        $cv->city = $request->city;
        $cv->street_address = $request->street;
        $cv->region = $request->region;
        $cv->country = $request->country;
        $cv->zip_code = $request->zip;
        $cv->phone_number = $request->phone;
        $cv->email = $request->email;
        $cv->education = $request->education;
        $cv->experience = $request->experience;
        $cv->skills = $request->skills;
        $cv->language = $request->language;
        $cv->age = $request->age;
        $cv->schedule = $request->schedule;
        $cv->add_information = $request->addInformation;
        $cv->user_id = Auth::user()->id;

        $cv->save();

    	return redirect()->route('home');
    }

    public function showUpdatePage(CV $cv) 
    {
    	return view('card', [
    		'cvs' => $cv,
    		'nameRoute' => 'updateCV'
    	]);
    }

    public function update(CvRequest $request, CV $cv) 
    {
    	$validated = $request->validated();

    	$cv->first_name = $request->firstName;
        $cv->last_name = $request->lastName;
        $cv->profession = $request->profession;
        $cv->salary = $request->salary;
        $cv->currency = $request->currency;
        $cv->city = $request->city;
        $cv->street_address = $request->street;
        $cv->region = $request->region;
        $cv->country = $request->country;
        $cv->zip_code = $request->zip;
        $cv->phone_number = $request->phone;
        $cv->email = $request->email;
        $cv->education = $request->education;
        $cv->experience = $request->experience;
        $cv->skills = $request->skills;
        $cv->language = $request->language;
        $cv->age = $request->age;
        $cv->schedule = $request->schedule;
        $cv->add_information = $request->addInformation;

        $cv->save();

    	return view('cv', [
    		'cv' => $cv
    	]);
    }

    public function delete(CV $cv) 
    {
    	$cv->delete();
    	return redirect()->route('home');
    }

    public function check(CV $cv) 
    {
    	$cv->checked = 1;
    	$cv->save();
    	return redirect()->route('home');
    }
}
