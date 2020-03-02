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

    public function showCreatePage(CV $cv, Request $request) 
    {
    	return view('card', [
    		'nameRoute' => 'createCV',
    		'cv' => [
                "first_name" => $request->old('first_name'),
                "last_name" => $request->old('last_name'),
                "profession" => $request->old('profession'),
                "salary" => $request->old('salary'),
                "currency" => $request->old('currency'),
                "city" => $request->old('city'),
                "street_address" => $request->old('street_address'),
                "region" => $request->old('region'),
                "country" => $request->old('country'),
                "zip_code" => $request->old('zip_code'),
                "phone_number" => $request->old('phone_number'),
                "email" => $request->old('email'),
                "education" => $request->old('education'),
                "experience" => $request->old('experience'),
                "skills" => $request->old('skills'),
                "language" => $request->old('language'),
                "age" => $request->old('age'),
                "schedule" => $request->old('schedule'),
                "add_information" => $request->old('add_information'),
                "image_link" => $request->old('image_link'),
                "schedule" => $request->old('schedule')
            ],

    	]);
    }

    public function create(CvRequest $request) 
    {
    	$validated = $request->validated();
        //var_dump($request->imageLink);die();
        $image_name = time().'.'.$request->image_link->extension();   
        $request->image_link->move(public_path('images'), $image_name);
        $cv = new CV;

        $cv->first_name = $request->first_name;
        $cv->last_name = $request->last_name;
        $cv->profession = $request->profession;
        $cv->salary = $request->salary;
        $cv->currency = $request->currency;
        $cv->city = $request->city;
        $cv->street_address = $request->street;
        $cv->region = $request->region;
        $cv->country = $request->country;
        $cv->zip_code = $request->zip_code;
        $cv->phone_number = $request->phone_number;
        $cv->email = $request->email;
        $cv->education = $request->education;
        $cv->experience = $request->experience;
        $cv->skills = $request->skills;
        $cv->language = $request->language;
        $cv->age = $request->age;
        $cv->schedule = $request->schedule;
        $cv->add_information = $request->add_information;
        $cv->image_link = $image_name;
        $cv->user_id = Auth::user()->id;

        $cv->save();

    	return redirect()->route('home');
    }

    public function showUpdatePage(CV $cv) 
    {
        //dd($cv->attributesToArray());
    	return view('card', [
    		'cv' => $cv->attributesToArray(),
    		'nameRoute' => 'updateCV'
    	]);
    }

    public function update(CvRequest $request, CV $cv) 
    {
    	$validated = $request->validated();
        $oldFileContent = base64_encode(file_get_contents(public_path('images') . '/' . $cv->image_link));
        $newFileContent = base64_encode(file_get_contents($request->image_link->getPathname()));

        if ($request->image_link && $oldFileContent != $newFileContent) {
            $image_name = time().'.'.$request->image_link->extension();   
            $request->image_link->move(public_path('images'), $image_name);

            $cv->image_link = $image_name;
        }

    	$cv->first_name = $request->first_name;
        $cv->last_name = $request->last_name;
        $cv->profession = $request->profession;
        $cv->salary = $request->salary;
        $cv->currency = $request->currency;
        $cv->city = $request->city;
        $cv->street_address = $request->street;
        $cv->region = $request->region;
        $cv->country = $request->country;
        $cv->zip_code = $request->zip_code;
        $cv->phone_number = $request->phone_number;
        $cv->email = $request->email;
        $cv->education = $request->education;
        $cv->experience = $request->experience;
        $cv->skills = $request->skills;
        $cv->language = $request->language;
        $cv->age = $request->age;
        $cv->schedule = $request->schedule;
        $cv->add_information = $request->add_information;

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
