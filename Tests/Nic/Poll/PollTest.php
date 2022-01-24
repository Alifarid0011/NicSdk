<?php

namespace FNDEV\Nic\Tests\Nic\Domain;

use FNDEV\Nic\Api\Domain\domain;
use FNDEV\Nic\Api\Poll\poll;
use FNDEV\Nic\Tests\TestCase;
use GuzzleHttp\Psr7\Response;

class PollTest extends TestCase
{
    public poll $poll;

    public function setUp(): void
    {
        Parent::setUp();
        $this->poll = new poll($this->client->getHttpClient());
    }

    public function test_poll_list()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/PollList.json")));
        $response = $this->poll->polls();
        $this->assertLastRequestEquals("POST", "/poll/lists");
        $this->assertEquals("Command completed successfully; ack to dequeue", $response->response->result->msg);
    }

    public function test_poll_acknowledge()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/PollAcknowledge.json")));
        $arr = ["message_id" => "26543"];
        $response = $this->poll->acknowledge($arr);
        $this->assertLastRequestEquals("POST", "/poll/acknowledge");
        $this->assertEquals("Command completed successfully", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

}
