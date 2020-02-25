<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CvController extends Controller
{
    public function index(CV $cv) 
    {
    	return view('cv', ['cv'=>$cv]);
    }

    public function showCreatePage(CV $cv) 
    {
    	return view('card', [
    		'nameRoute'=>'createCV',
    		'cvs'=>[]
    	]);
    }

    public function create(Request $request) 
    {
    	$validator = Validator::make($request->all(), [
            'firstName' => 'bail|required|max:255',
    		'lastName' => 'bail|required|max:255',
    		'profession' => 'bail|required|max:255',
    		'salary' => 'nullable|numeric|max:1000000000',
    		'currency' => 'max:255',
    		'city' => 'max:255',
    		'street' => 'max:255',
    		'region' => 'max:255',
    		'country' => 'max:255',
    		'zip' => 'nullable|numeric|max:999999',
    		'phone' => 'max:255',
    		'email' => 'bail|required|email:rfc,dns',
    		'language' => 'max:255',
    		'age' => 'nullable|numeric|max:100',
    		'schedule' => 'max:255',
        ]);

        if ($validator->fails()) {
        	//dd($validator);
            return back()
                        ->withErrors($validator)
                        ->withInput();
                        //redirect('post/create')
        }
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
  		//dd($request);

    	return redirect()->route('home');
    }

    public function update(Request $request, CV $cv) 
    {
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

    	return view('cv', ['cv'=>$cv]);
    }

    public function showUpdatePage(CV $cv) 
    {
    	return view('card', [
    		'cvs'=>$cv,
    		'nameRoute'=>'updateCV'
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

    public function premium(CV $cv) 
    {
    	//
    }
    public function manager(CV $cv) 
    {
    	//
    }
}
