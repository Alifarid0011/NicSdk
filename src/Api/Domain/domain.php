<?php

namespace FNDEV\Nic\Api\Domain;

use FNDEV\Nic\Api\AbstractClass\init;
use FNDEV\Nic\Api\Contact\contact;
use FNDEV\Nic\NicApiResponse;
use GuzzleHttp\RequestOptions;

class domain extends init
{

    /**
     * @param $domain
     * @return mixed
     */
    public function check($domain)
    {
        return NicApiResponse::BodyResponse($this->HttpClient
            ->post('domain/check', [
                RequestOptions::JSON => $domain
            ]));

    }

    /**
     * @param $domain
     * @return mixed
     */
    public function info($domain)
    {
        return NicApiResponse::BodyResponse($this->HttpClient->post('domain/info', [
                    RequestOptions::JSON => $domain
                ]));
    }

    /**
     * @param $domain
     * @return mixed
     */
    public function renew($domain)
    {
        return NicApiResponse::BodyResponse($this->HttpClient
            ->post('domain/renew',  [
                RequestOptions::JSON => $domain
            ]));
    }

    /**
     * @param $domain
     * @return mixed
     */
    public function create($domain)
    {
        return NicApiResponse::BodyResponse($this->HttpClient
            ->post('domain/create',  [
                RequestOptions::JSON => $domain
            ]));
    }

    /**
     * @param $domain
     * @return mixed
     */
    public function delete($domain)
    {
        return NicApiResponse::BodyResponse($this->HttpClient
            ->delete('domain/delete',  [
                RequestOptions::JSON => $domain
            ]));
    }

    /**
     * @param $domain
     * @return mixed
     */
    public function lock($domain)
    {
        return NicApiResponse::BodyResponse($this->HttpClient
            ->post('domain/lock',  [
                RequestOptions::JSON => $domain
            ]));
    }

    /**
     * @param $domain
     * @return mixed
     */
    public function unlock($domain)
    {
        return NicApiResponse::BodyResponse($this->HttpClient
            ->post('domain/unlock',  [
                RequestOptions::JSON => $domain
            ]));
    }

    /**
     * @param $domain
     * @return mixed
     */
    public function addNameserver($domain)
    {
        return NicApiResponse::BodyResponse($this->HttpClient
            ->post('domain/add-name-server',  [
                RequestOptions::JSON => $domain
            ]));
    }

    /**
     * @param $domain
     * @return mixed
     */
    public function delNameserver($domain)
    {
        return NicApiResponse::BodyResponse($this->HttpClient
            ->delete('domain/remove-name-server',  [
                RequestOptions::JSON => $domain
            ]));

    }


    /**
     * @param $domain
     * @return mixed
     */
    public function changeContact($domain)
    {

        return NicApiResponse::BodyResponse($this->HttpClient
            ->post('domain/change-contact',  [
                RequestOptions::JSON => $domain
            ]));
    }
    /**
     * @param $domain
     * @return mixed
     */
    public function transfer($domain)
    {
        return NicApiResponse::BodyResponse($this->HttpClient
            ->post('domain/transfer',  [
                RequestOptions::JSON => $domain
            ]));
    }

    public function nameserver($nameserver): array
    {
        $nn = [];
        if (is_string($nameserver))
            $nn['host_name'] = $nameserver;
        else {
            $nn['host_name'] = $nameserver['domain'];
            if (isset($nameserver['ip'])) {
                $nn['host_addr'] = [
                    "ip" => $nameserver['ip'],
                    "version" => "v4"
                ];
            }
        }
        return $nn;
    }
}
