<?php


namespace FNDEV\Nic;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
class NicApiResponse
{
    const OK=200;
    public static function BodyResponse(ResponseInterface $response){
        return json_decode($response->getBody());
    }
    public static function HasError(ResponseInterface $response){
        return !($response->getStatusCode()>=200 and $response->getStatusCode() <300);
    }

}
