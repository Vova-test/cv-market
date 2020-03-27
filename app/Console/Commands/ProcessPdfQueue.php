<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;
use App\Models\CV;
use PDF;
use File;

class ProcessPdfQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf-queue:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        while (true) {
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
            if (!$result) {
                sleep(1);
                continue;
            }

            $cv = CV::find(json_decode($result)->content);

            if (empty($cv)) {
                sleep(1);
                continue;                
            }

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
            
            sleep(1);
            die();
        }
    }
}
