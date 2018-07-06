<?php

namespace Kwk\Geckoboard\Dataset;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;

class RequestFactory
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @param ClientInterface $client
     * @param string          $apiKey
     */
    public function __construct(ClientInterface $client, $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
    }

    /**
     * @param DataSetInterface $dataSet
     *
     * @return RequestInterface
     */
    public function getCreateRequest(DataSetInterface $dataSet)
    {
        return new Request(
            'PUT',
            sprintf('/datasets/%s', $dataSet->getName()),
            [
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic '.base64_encode($this->apiKey.':'),
            ],
            \GuzzleHttp\json_encode($dataSet->getDefinition())
        );
    }

    /**
     * @param string                $datasetName
     * @param DataSetRowInterface[] $rows
     *
     * @return RequestInterface
     */
    public function getAppendRequest($datasetName, array $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = $row->getData();
        }

        return new Request(
            'POST',
            sprintf('/datasets/%s/data', $datasetName),
            [
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic '.base64_encode($this->apiKey.':'),
            ],
            \GuzzleHttp\json_encode(['data' => $data])
        );
    }

    /**
     * @param string                $datasetName
     * @param DataSetRowInterface[] $rows
     *
     * @return RequestInterface
     */
    public function getReplaceRequest($datasetName, array $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = $row->getData();
        }

        return new Request(
            'PUT',
            sprintf('/datasets/%s/data', $datasetName),
            [
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic '.base64_encode($this->apiKey.':'),
            ],
            \GuzzleHttp\json_encode(['data' => $data])
        );
    }

    /**
     * @param string $datasetName
     *
     * @return RequestInterface
     */
    public function getDeleteRequest($datasetName)
    {
        return new Request(
            'DELETE',
            sprintf('/datasets/%s', $datasetName),
            [
                'Authorization' => 'Basic '.base64_encode($this->apiKey.':'),
            ]
        );
    }
}
