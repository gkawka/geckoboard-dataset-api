<?php

namespace Test\Kwk\Geckoboard\Dataset;

use GuzzleHttp\Client;
use GuzzleHttp\Message\MessageFactory;
use Kwk\Geckoboard\Dataset\RequestFactory;
use Test\Kwk\Geckoboard\Dataset\Resources\Dataset\TestDatarow;
use Test\Kwk\Geckoboard\Dataset\Resources\Dataset\TestDataset;

class RequestFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test is even class exists
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Kwk\Geckoboard\Dataset\RequestFactory'), 'Class `Kwk\Geckoboard\Dataset\RequestFactory` does not exists');
    }

    /**
     * @test building request for DataSet creation
     */
    public function testGetCreateRequest()
    {
        $expectedRequestBody = [
            "fields" => [
                'date'   => [
                    'type' => 'date',
                    'name' => 'Date',
                ],
                'number' => [
                    'type'     => 'number',
                    'name'     => 'Number',
                    'optional' => false,
                ],
            ],
        ];

        $request = (new RequestFactory(new Client(), ''))->getCreateRequest(new TestDataset());

        $this->assertEquals('PUT', $request->getMethod());
        $this->assertEquals('/datasets/test', $request->getUrl());
        $this->assertEquals('application/json', $request->getHeader('Content-Type'), 'Request should have `Content-type` header with value `application/json`');
        $this->assertEquals(json_encode($expectedRequestBody), $request->getBody()->getContents());
    }

    /**
     * @test building request for append datarow to DataSet
     */
    public function testGetAppendRequest()
    {
        $expectedBody = [
            'data' => [
                [
                    'param1' => 'val1',
                    'param2' => 'val2',
                ],
                [
                    'param1' => 'val1',
                    'param2' => 'val2',
                ],
            ],
        ];

        $request = (new RequestFactory(new Client(), ''))
            ->getAppendRequest('test', [new TestDatarow(), new TestDatarow()]);

        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('/datasets/test/data', $request->getUrl());
        $this->assertEquals('application/json', $request->getHeader('Content-Type'), 'Request should have `Content-type` header with value `application/json`');
        $this->assertEquals(json_encode($expectedBody), $request->getBody()->getContents());
    }

    /**
     * @test building request for replacing datarow to DataSet
     */
    public function testGetReplaceRequest()
    {
        $expectedBody = [
            'data' => [
                [
                    'param1' => 'val1',
                    'param2' => 'val2',
                ],
                [
                    'param1' => 'val1',
                    'param2' => 'val2',
                ],
            ],
        ];

        $request = (new RequestFactory(new Client(), ''))->getReplaceRequest('test', [new TestDatarow(), new TestDatarow()]);

        $this->assertEquals('PUT', $request->getMethod());
        $this->assertEquals('/datasets/test/data', $request->getUrl());
        $this->assertEquals('application/json', $request->getHeader('Content-Type'), 'Request should have `Content-type` header with value `application/json`');
        $this->assertEquals(json_encode($expectedBody), $request->getBody()->getContents());
    }

    /**
     * @test building request for deleting DataSet
     */
    public function testGetDeleteRequest()
    {
        $request = (new RequestFactory(new Client(), ''))->getDeleteRequest('test');

        $this->assertEquals('DELETE', $request->getMethod());
        $this->assertEquals('/datasets/test', $request->getUrl());
    }
}
