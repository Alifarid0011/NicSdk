<?php

namespace FNDEV\Nic\Api;


use FNDEV\Nic\Api\Contact\contact;
use FNDEV\Nic\Api\Domain\domain;
use FNDEV\Nic\Api\Poll\poll;
use FNDEV\Nic\Client\GuzzleClient;
use GuzzleHttp\Client;


class NicApi extends Client
{
    public $HttpClient;

    public function __construct($gateway = null, $token = null, ?Client $client = null)
    {
        $this->HttpClient = $client ?? new GuzzleClient($gateway, $token);
    }

    public function getHttpClient()
    {
        return $this->HttpClient;
    }

    public function domain()
    {
        return new domain($this->HttpClient);
    }

    public function poll()
    {
        return new poll($this->HttpClient);
    }

    public function contact()
    {
        return new contact($this->HttpClient);
    }

}
