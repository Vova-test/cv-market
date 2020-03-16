<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;
use App\Services\CvService;
use App\Services\EmailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CvRequest;

class CvController extends Controller
{
    public function __construct(CvService $cv, EmailService $email)
    {
        $this->cv = $cv;
        $this->email = $email;
    }

    public function index(CV $cv) 
    {
        $resultValidation = $this->email->check($cv->email);
        //dd($resultValidation['success']);
        if (!$resultValidation['success'] && !$resultValidation['result']) {
            $emailIcon = 'ban';
            $iconColor = 'uk-text-warning';
        }

        if ($resultValidation['success'] && !$resultValidation['result']) {
            $emailIcon = 'close';
            $iconColor = 'uk-text-danger';
        }

        if ($resultValidation['success'] && $resultValidation['result']) {
            $emailIcon = 'check';
            $iconColor = 'uk-text-success';
        }

    	//return view('cv', array_merge(['cv' => $cv], $resultValidation));
        return view('cv', [
            'cv' => $cv,
            'emailIcon' => $emailIcon,
            'iconColor' => $iconColor
        ]);
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

        $image_name ='';

        if (isset($request->image_link)) {
            $image_name = time().'.'.$request->image_link->extension();  
            $request->image_link
                ->move(public_path('images'), $image_name);
        }

        $this->cv->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'profession' => $request->profession,
            'salary' => $request->salary,
            'currency' => $request->currency,
            'city' => $request->city,
            'street_address' => $request->street,
            'region' => $request->region,
            'country' => $request->country,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'education' => $request->education,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'language' => $request->language,
            'age' => $request->age,
            'schedule' => $request->schedule,
            'add_information' => $request->add_information,
            'image_link' => $image_name,
            'user_id' => Auth::user()->id
        ]);

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

        $imageContent = true;

        $updatedFields = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'profession' => $request->profession,
            'salary' => $request->salary,
            'currency' => $request->currency,
            'city' => $request->city,
            'street_address' => $request->street,
            'region' => $request->region,
            'country' => $request->country,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'education' => $request->education,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'language' => $request->language,
            'age' => $request->age,
            'schedule' => $request->schedule,
            'add_information' => $request->add_information
        ];

        if ($cv->image_link && $request->image_link) {            
            $oldFileContent = base64_encode(file_get_contents(public_path('images') . '/' . $cv->image_link));
            $newFileContent = base64_encode(file_get_contents($request->image_link->getPathname()));

            $imageContent = ($oldFileContent != $newFileContent);
        }    

        if ($request->image_link && $imageContent) {
            $image_name = time().'.'.$request->image_link->extension();   
            $request->image_link->move(public_path('images'), $image_name);

            $updatedFields += ['image_link' => $image_name];
        }

        $this->cv->update($cv->id, $updatedFields);

    	return view('cv', [
            'cv' => $cv
        ]);
    }

    public function delete(int $cv) 
    {
        $this->cv->delete($cv);
    	return redirect()->route('home');
    }

    public function check(int $cv) 
    {
        $this->cv->check($cv, ['checked' => 1]);
    	return redirect()->route('home');
    }
}
