<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;

class PdfController extends Controller
{
    public function addPdf(Request $request)
    {
    	$headers = [
			'email' => env('QUEUE_API_EMAIL'),
			'password' => env('QUEUE_API_PASSWORD')
		];
		$client = new GuzzleClient([
		    'headers' => $headers
		]);
		$title = env('QUEUE_API_TITLE');
		$content = $request["cv"];

		$request = $client->request('POST', "http://queue-and-api.loc/api/content/add?title=$title&content=$content");

		if ($request->getBody()->getContents()) {
			return "The CV will be convert to PDF file format!";
		}
		return "There is error 'convert file to PDF'!";
    }
}
