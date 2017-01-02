<?php

namespace Kwk\Geckoboard\Dataset;

use GuzzleHttp\Message\MessageFactoryInterface;
use GuzzleHttp\Message\RequestInterface;

class RequestFactory
{
    /**
     * @var MessageFactoryInterface
     */
    private $factory;

    /**
     * @param MessageFactoryInterface $factory
     */
    public function __construct(MessageFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param DataSetInterface $dataSet
     *
     * @return RequestInterface
     */
    public function getCreateRequest(DataSetInterface $dataSet)
    {
        return $this->factory->createRequest(
            'PUT',
            sprintf('/datasets/%s', $dataSet->getName()),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
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

        return $this->factory->createRequest(
            'POST',
            sprintf('/datasets/%s/data', $datasetName),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
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

        return $this->factory->createRequest(
            'PUT',
            sprintf('/datasets/%s/data', $datasetName),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
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
        return $this->factory->createRequest(
            'DELETE',
            sprintf('/datasets/%s', $datasetName)
        );
    }
}
