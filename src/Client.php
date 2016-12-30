<?php

namespace Kwk\Geckoboard\Dataset;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

class Client
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @param HttpClient $httpClient
     * @param string     $apiKey
     */
    public function __construct(HttpClient $httpClient, $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey     = $apiKey;
    }

    /**
     * Tworzenie dataSet
     *
     * @param DataSetInterface $dataSet
     *
     * @return ResponseInterface
     * @throws RequestException
     */
    public function create(DataSetInterface $dataSet)
    {
        $request = RequestFactory::getCreateRequest($dataSet);

        return $this->httpClient->send($request, ['auth' => [$this->apiKey, '']]);
    }

    /**
     * Dodaje wiersz do dataset'u
     *
     * @param DataSetInterface      $dataSet
     * @param DataSetRowInterface[] $dataRows
     *
     * @return ResponseInterface
     */
    public function append(DataSetInterface $dataSet, array $dataRows)
    {
        $request = RequestFactory::getAppendRequest($dataSet->getName(), $dataRows);

        return $this->httpClient->send($request, ['auth' => [$this->apiKey, '']]);
    }

    /**
     * Podmienia cały dataset
     *
     * @param DataSetInterface      $dataSet
     * @param DataSetRowInterface[] $dataRows
     *
     * @return ResponseInterface
     */
    public function replace(DataSetInterface $dataSet, array $dataRows)
    {
        $request = RequestFactory::getReplaceRequest($dataSet->getName(), $dataRows);

        return $this->httpClient->send($request, ['auth' => [$this->apiKey, '']]);
    }

    /**
     * Usunięcie dataset'u
     *
     * @param DataSetInterface $dataSet
     *
     * @return ResponseInterface
     */
    public function delete(DataSetInterface $dataSet)
    {
        $request = RequestFactory::getDeleteRequest($dataSet->getName());

        return $this->httpClient->send($request, ['auth' => [$this->apiKey, '']]);
    }
}
