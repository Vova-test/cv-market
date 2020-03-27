<?php

namespace App\Http\Controllers;

use App\Models\CV;
use PDF;
use File;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;

class CvToPDFController extends Controller
{
    public function index(CV $cv)
    {
        $headers = [
            'email' => env('QUEUE_API_EMAIL'),
            'password' => env('QUEUE_API_PASSWORD')
            ];

            $client = new GuzzleClient([
                'headers' => $headers
            ]);

            $title = env('QUEUE_API_TITLE');

            $request = $client->request('POST', "http://queue-and-api.loc/api/content/get",[
                'form_params' => [
                    'title' => $title
                ]
            ]);

            $result = $request->getBody()->getContents();
        //Get image content
        if (!empty($cv->image_link)) {
            $imageContent = base64_encode(File::get(public_path('/images/'.$cv->image_link)));
            //var_dump($imageContent);die();
        }
    	//Set extra option
    	PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

    	// pass view file
        $pdf = PDF::loadView('cv_pdf', [
            'cv' => $cv,
            'imageContent' => $imageContent
        ]);
        // download pdf
        return $pdf->save(public_path().'/images/pdf/cv_' . $cv->id . '.pdf')
                   ->stream();
        //return $pdf->download('cv_' . $cv->id . '.pdf');

        return view('cv_pdf', [
            'cv' => $cv,
            'imageContent' => $imageContent
        ]);
    }
}