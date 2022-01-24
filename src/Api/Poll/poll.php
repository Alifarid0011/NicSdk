<?php

namespace FNDEV\Nic\Api\Poll;

use FNDEV\Nic\Api\AbstractClass\init;
use FNDEV\Nic\NicApiResponse;
use GuzzleHttp\RequestOptions;

class poll extends init
{
    public function polls()
    {
        return NicApiResponse::BodyResponse($this->HttpClient->post('poll/lists'));
    }

    public function acknowledge($poll)
    {
        return NicApiResponse::BodyResponse($this->HttpClient
            ->post('poll/acknowledge', [
                RequestOptions::JSON => $poll
            ]));
    }

}
