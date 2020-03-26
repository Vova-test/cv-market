<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;

class PdfController extends Controller
{
    public function addPdf(int $cv)
    {
    	$headers = [
			'email' => env('QUEUE_API_EMAIL'),
			'password' => env('QUEUE_API_PASSWORD')
		];

		$client = new GuzzleClient([
		    'headers' => $headers
		]);

		$title = env('QUEUE_API_TITLE');
		$content = $cv;

		$request = $client->request('POST', "http://queue-and-api.loc/api/content/add",[
			'form_params' => [
				'title' => $title,
				'content' => $content,
			]
		]);

		if ($request->getBody()->getContents()) {
			return response()->json(['success' => true]);
		}
		return response()->json(['success' => false]);
		//return "There is error 'convert file to PDF'!";
    }
}