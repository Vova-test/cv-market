<?php

namespace App\Services;

use \GuzzleHttp\Client as  HttpClient;

class ApiEmailService extends BaseService
{
    public function isEmailValid(string $email)
    {
        $apiUrl = env("EMAIL_API_BASE_URL");
        $apiKey = env("EMAIL_API_KEY");
        $apiQueryUrl = "$apiUrl?access_key=$apiKey&email=$email";
        
        $client = new HttpClient();
        $response = $client->get($apiQueryUrl);
        $emailInfo = json_decode($response->getBody(), true);

        if (isset($emailInfo['smtp_check'])) {
            return [
                'success' => true,
                'result' => $emailInfo['smtp_check']
            ];
        }

        return [
            'success' => false,
            'result' => false
        ];
    }

}
