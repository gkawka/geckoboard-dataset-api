<?php

namespace Kwk\Geckoboard\Dataset;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;

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
        return $this->client->createRequest(
            'PUT',
            sprintf('/datasets/%s', $dataSet->getName()),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'auth'    => [$this->apiKey, ''],
                'json'    => $dataSet->getDefinition(),
            ]
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

        return $this->client->createRequest(
            'POST',
            sprintf('/datasets/%s/data', $datasetName),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'auth'    => [$this->apiKey, ''],
                'json'    => ['data' => $data],
            ]
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

        return $this->client->createRequest(
            'PUT',
            sprintf('/datasets/%s/data', $datasetName),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'auth'    => [$this->apiKey, ''],
                'json'    => ['data' => $data],
            ]
        );
    }

    /**
     * @param string $datasetName
     *
     * @return RequestInterface
     */
    public function getDeleteRequest($datasetName)
    {
        return $this->client->createRequest(
            'DELETE',
            sprintf('/datasets/%s', $datasetName),
            [
                'auth' => [$this->apiKey, ''],
            ]
        );
    }
}
