<?php

namespace Witify\LaravelJsonResponse\Tests;

use PHPUnit\Framework\TestCase;
use Witify\LaravelJsonResponse\ResponseFactory;

class ResponseFactoryTest extends TestCase
{
    private $factory;

    public function setUp()
    {
        parent::setUp();
        $this->factory = new ResponseFactory();
    }

    public function test_default_status_code_is_200()
    {
        $this->assertEquals($this->factory->getStatusCode(), 200);
    }

    public function test_set_status_code()
    {
        $statusCode = 422;
        $this->factory->setStatusCode($statusCode);
        $this->assertEquals($this->factory->getStatusCode(), $statusCode);
    }

    public function test_json_response()
    {
        $data = ['testData' => 3];
        $response = $this->factory->response($data);
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertEquals($response->getData(), (object) $data);
    }

    public function test_json_response_success()
    {
        $response = $this->factory->success();
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertTrue($response->getData()->success);
        $this->assertObjectHasAttribute('message', $response->getData());
        $this->assertObjectHasAttribute('data', $response->getData());
    }

    public function test_json_response_error()
    {
        $response = $this->factory->error();
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertFalse($response->getData()->success);
        $this->assertObjectHasAttribute('errors', $response->getData());
        $this->assertObjectHasAttribute('data', $response->getData());
    }

    public function test_json_redirect()
    {
        $url = '/test';
        $response = $this->factory->redirect($url);
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertEquals($response->getData()->redirect, $url);
    }

    public function test_json_created()
    {
        $response = $this->factory->created();
        $this->assertEquals($response->getStatusCode(), 201);
    }

    public function test_json_bad_request()
    {
        $response = $this->factory->badRequest();
        $this->assertEquals($response->getStatusCode(), 400);
    }

    public function test_json_forbidden()
    {
        $response = $this->factory->forbidden();
        $this->assertEquals($response->getStatusCode(), 403);
    }

    public function test_json_not_found()
    {
        $response = $this->factory->notFound();
        $this->assertEquals($response->getStatusCode(), 404);
    }

    public function test_json_bad_entity()
    {
        $response = $this->factory->badEntity();
        $this->assertEquals($response->getStatusCode(), 422);
    }

    public function test_json_server_error()
    {
        $response = $this->factory->serverError();
        $this->assertEquals($response->getStatusCode(), 500);
    }
}

