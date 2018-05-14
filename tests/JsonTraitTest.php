<?php

namespace Witify\LaravelJsonResponse\Tests;

use PHPUnit\Framework\TestCase;
use Witify\LaravelJsonResponse\JsonTrait;
use Witify\LaravelJsonResponse\ResponseFactory;

class JsonTraitTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function test_json_method_is_added()
    {
        $mock = $this->getMockForTrait(JsonTrait::class);
        $this->assertTrue(
            method_exists($mock, 'json'), 
            'Class does not have method json'
        );
    }

    public function test_json_method_returns_a_response_factory_object()
    {
        $mock = $this->getMockForTrait(JsonTrait::class);
        $this->assertTrue(
            method_exists($mock->json(), 'setStatusCode'), 
            'Class returned by json() does not have method setStatusCode'
        );
        $this->assertInstanceOf(ResponseFactory::class, $mock->json());
    }
}
