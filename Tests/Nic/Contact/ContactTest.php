<?php

namespace FNDEV\Nic\Tests\Nic\Contact;


use FNDEV\Nic\Api\Contact\contact;
use FNDEV\Nic\Tests\TestCase;
use GuzzleHttp\Psr7\Response;


class ContactTest extends TestCase
{
    public contact $contact;

    public function setUp(): void
    {
        Parent::setUp();
        $this->contact = new contact($this->client->getHttpClient());
    }

    public function test_contact_check()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/contactCheck.json")));
        $arr = ["contact_id" => 'ex999-irnic'];
        $response = $this->contact->check($arr);
        $this->assertLastRequestEquals("POST", "/contact/check");
        $this->assertEquals("Command completed successfully", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }
    public function test_contact_info()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/contactInfo.json")));
        $arr = ["contact_id" => 'ex999-irnic'];
        $response = $this->contact->info($arr);
        $this->assertLastRequestEquals("POST", "/contact/info");
        $this->assertEquals("Authentication error", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_contact_update()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/contactUpdate.json")));
        $arr = [
            "contact_id" => "ex999-irnic",
            "street" => "hemmat gharb shark",
            "city" => "terhan",
            "province" => "tehan",
            "postal_code" => "123456789",
            "country" => "IR"
        ];
        $response = $this->contact->update($arr);
        $this->assertLastRequestEquals("POST", "/contact/update");
        $this->assertEquals("Object does not exist", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }

    public function test_contact_create()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . "/fixture/contactCreate.json")));
        $arr = [
            "type" => "gov",
            "first_name" => "hello",
            "last_name" => "itsme",
            "identify" => [
                "province" => "Tehran",
                "city" => "Terhan",
                "category" => "Executive__Ministry",
                "country" => "IR"
            ],
            "country" => "IR",
            "street" => "hemmat gharb",
            "city" => "Tehran",
            "province" => "Tehran",
            "postal_code" => "123456789",
            "phone" => "+989101490337",
            "email" => "hello@gmail.com"
        ];
        $response = $this->contact->create($arr);
        $this->assertLastRequestEquals("POST", "/contact/create");
        $this->assertEquals("Unimplemented option", $response->response->result->msg);
        $this->assertLastRequestBody($arr);
    }
}
