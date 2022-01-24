<?php

namespace FNDEV\Nic\Tests\Nic\Domain;

use FNDEV\Nic\Api\Domain\domain;
use FNDEV\Nic\Tests\TestCase;
use GuzzleHttp\Psr7\Response;

class DomainTest extends TestCase
{
    public domain $domain;

    public function setUp(): void
    {
        Parent::setUp();
        $this->domain = new domain($this->client->getHttpClient());
    }

    public function test_domain_check()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainCheck.json")));
        $arr = [
            "domain" => "google.ir"
        ];
        $response = $this->domain->check($arr);
        $this->assertLastRequestEquals("POST", "/domain/check");
        $this->assertEquals("Command completed successfully", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_domain_info()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainInfo.json")));
        $arr = [
            "domain" => "google.ir"
        ];
        $response = $this->domain->info($arr);
        $this->assertLastRequestEquals("POST", "/domain/info");
        $this->assertEquals("Command completed successfully", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_domain_delete()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainDelete.json")));
        $arr = [
            "domain" => "nic.ir"
        ];
        $response = $this->domain->delete($arr);
        $this->assertLastRequestEquals("DELETE", "/domain/delete");
        $this->assertEquals("Authorization error", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_domain_addNameServer()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainAddNameServer.json")));
        $arr = [
            "domain" => "farid.ir",
            "nameservers" => [
                [
                    "host_name" => "ns2.example.com"
                ]
            ]
        ];
        $response = $this->domain->addNameserver($arr);
        $this->assertLastRequestEquals("POST", "/domain/add-name-server");
        $this->assertEquals("Authorization error", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_domain_create()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainCreate.json")));
        $arr = [
            "domain" => "google.ir",
            "period" => 12,
            "nameservers" => [
                [
                    "host_name" => "ns1.fanava.xyz",
                    "host_addr" => "78.157.44.26"
                ],
                [
                    "host_name" => "ns1.fanava.xyz",
                    "host_addr" => "78.157.44.26"
                ]
            ],
            "holder" => "irx-bga.ir",
            "admin" => "irx-bga.ir",
            "tech" => "irx-bga.ir",
            "bill" => "irx-bga.ir",
            "agreement" => true
        ];
        $response = $this->domain->create($arr);
        $this->assertLastRequestEquals("POST", "/domain/create");
        $this->assertEquals("Unimplemented option", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_renew_domain()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainRenew.json")));
        $arr = [
            "domain" => "example.ir",
            "exp_date" => "2022-4-12",
            "period" => 10
        ];
        $response = $this->domain->renew($arr);
        $this->assertLastRequestEquals("POST", "/domain/renew");
        $this->assertEquals("Object does not exist", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_domain_removeNameServer()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainDelete.json")));
        $arr = [
            "domain" => "nic.ir",
            "nameservers" => [
                [
                    "host_name" => "ns1.example.com",
                    "host_addr" => [
                        "ip" => "127.0.0.1",
                        "version" => "v4"
                    ]
                ]
            ]
        ];
        $response = $this->domain->delNameserver($arr);
        $this->assertLastRequestEquals("DELETE", "/domain/remove-name-server");
        $this->assertEquals("Authorization error", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_domain_lock()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainLock.json")));
        $arr = [
            "domain" => "nic.ir"
        ];
        $response = $this->domain->lock($arr);
        $this->assertLastRequestEquals("POST", "/domain/lock");
        $this->assertEquals("Parameter value policy error", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_domain_unlock()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainLock.json")));
        $arr = [
            "domain" => "nic.ir"
        ];
        $response = $this->domain->unlock($arr);
        $this->assertLastRequestEquals("POST", "/domain/unlock");
        $this->assertEquals("Parameter value policy error", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_domain_changeContact()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainChangeContact.json")));
        $arr = [
            "domain" => "hello.ir",
            "contacts" => [
                "tech" => "ex176-irnic"
            ]
        ];
        $response = $this->domain->changeContact($arr);
        $this->assertLastRequestEquals("POST", "/domain/change-contact");
        $this->assertEquals("Authentication error", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_domain_Transfer()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/DomainTransfer.json")));
        $arr = [
            "domain" => "nic.ir",
            "holder" => "ex61-irnic",
            "admin" => "ex61-irnic",
            "bill" => "ex61-irnic",
            "tech" => "ex61-irnic",
            "transfer_pin_code" => 101234569
        ];
        $response = $this->domain->transfer($arr);
        $this->assertLastRequestEquals("POST", "/domain/transfer");
        $this->assertEquals("Required parameter missing", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }
}
