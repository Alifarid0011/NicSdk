<?php


namespace FNDEV\Nic\Client;

use FNDEV\CrmSdk\CrmSdk;
use FNDEV\vShpare\Auth\SessionHandler;
use GuzzleHttp\Client;


class GuzzleClient extends Client
{
    public function __construct($gateway , $token , array $config = [])
    {
        $guzzleConfig = array_merge([
            'base_uri' => "http://".$gateway,
            "verify" => false,
            'headers' => [
                'Authorization' => "Bearer $token",
                'Content-Type' => 'application/json',
                "Accept" => "application/json"
            ],
        ], $config);
        parent::__construct($guzzleConfig);
    }

}
