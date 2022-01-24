<?php
namespace FNDEV\Nic\Api\Contact;
use FNDEV\Nic\Api\AbstractClass\init;
use FNDEV\Nic\NicApiResponse;
use GuzzleHttp\RequestOptions;

class contact extends init
{
    /**
     * @param $contact
     * @return mixed

     */
    public function check($contact)
    {
         return NicApiResponse::BodyResponse($this->HttpClient->post("contact/check",[
             RequestOptions::JSON=>$contact
         ]));

    }
    /**
     * @param $contact
     * @return mixed
     */
    public function create($contact)
    {
         return NicApiResponse::BodyResponse($this->HttpClient->post("contact/create",[
             RequestOptions::JSON=>$contact
         ]));
    }
    /**
     * @param $contact
     * @return mixed
     */
    public function update($contact)
    {
         return NicApiResponse::BodyResponse($this->HttpClient->post("contact/update",[
             RequestOptions::JSON=>$contact
         ]));
    }
    /**
     * @param $contact
     * @return mixed
     */
    public function info($contact)
    {
         return NicApiResponse::BodyResponse($this->HttpClient->post("contact/info",[
             RequestOptions::JSON=>$contact
         ]));
    }
}
