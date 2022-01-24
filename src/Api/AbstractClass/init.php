<?php


namespace FNDEV\Nic\Api\AbstractClass;

abstract class init
{    public $HttpClient;

    public function __construct($Client)
    {
        $this->HttpClient=$Client;
    }

}
