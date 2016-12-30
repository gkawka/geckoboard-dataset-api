<?php

namespace Kwk\Geckoboard\Dataset;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class RequestFactory
{
    /**
     * @param DataSetInterface $dataSet
     *
     * @return Request
     */
    public static function getCreateRequest(DataSetInterface $dataSet)
    {
        return new Request(
            'PUT',
            sprintf('/datasets/%s', $dataSet->getName()),
            ['Content-Type' => 'application/json'],
            json_encode($dataSet->getDefinition())
        );
    }

    /**
     * @param string                $datasetName
     * @param DataSetRowInterface[] $rows
     *
     * @return RequestInterface
     */
    public static function getAppendRequest($datasetName, array $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = $row->getData();
        }

        return new Request(
            'POST',
            sprintf('/datasets/%s/data', $datasetName),
            ['Content-Type' => 'application/json'],
            json_encode(['data' => $data])
        );
    }

    /**
     * @param string                $datasetName
     * @param DataSetRowInterface[] $rows
     *
     * @return RequestInterface
     */
    public static function getReplaceRequest($datasetName, array $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = $row->getData();
        }

        return new Request(
            'PUT',
            sprintf('/datasets/%s/data', $datasetName),
            ['Content-Type' => 'application/json'],
            json_encode(['data' => $data])
        );
    }

    /**
     * @param string $datasetName
     *
     * @return RequestInterface
     */
    public static function getDeleteRequest($datasetName)
    {
        return new Request(
            'DELETE',
            sprintf('/datasets/%s', $datasetName)
        );
    }
}
