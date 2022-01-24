<?php

namespace FNDEV\Nic\Tests;


use FNDEV\Nic\Api\NicApi;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use Illuminate\Http\Client\Factory;


class TestCase extends  \PHPUnit\Framework\TestCase
{


    public $mockHandler;
    public $client;
    public $Nic;

    public function setUp(): void
    {
        $this->mockHandler = new MockHandler();
        $this->client =new  NicApi("JymVL4MTokDkVwsL",'78.157.48.155',new Client(['handler'=>$this->mockHandler]));
    }
    public function tearDown(): void
    {
        $this->mockHandler->reset();
        Parent::tearDown();
    }

    public function assertLastRequestEquals($method, $urlFragment)
    {
        $this->assertEquals($this->mockHandler->getLastRequest()->getMethod(), $method);
        $this->assertEquals('/'.$this->mockHandler->getLastRequest()->getUri()->getPath(), $urlFragment);
    }
    public function assertLastRequestBodyIsEmpty()
    {
        $body = (string) $this->mockHandler->getLastRequest()->getBody();
        $this->assertEmpty($body);
    }
    public function assertLastRequestQueryStrings($query){
        $this->assertEquals($this->mockHandler->getLastRequest()->getUri()->getQuery(),http_build_query($query));
    }
    public function assertLastRequestBody($body){
        $this->assertEquals((string)$this->mockHandler->getLastRequest()->getBody(),json_encode($body));
    }

}
