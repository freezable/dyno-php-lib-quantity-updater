<?php

namespace DynoLib;

use DynoLib\Http\ClientInterface;
use DynoLib\Http\Request;
use DynoLib\Http\RequestInterface;

class Processor
{
    /**
     * @var ClientInterface
     */
    protected $httpClient;
    /**
     * @var Config
     */
    protected $config;

    /**
     * @param ClientInterface $httpClient
     * @param Config          $config
     */
    public function __construct($httpClient, $config)
    {
        $this->httpClient = $httpClient;
        $this->config = $config;
    }

    /**
     * @param  Update $update
     * @return bool
     * @throws \Exception
     */
    public function updateDynoQty($update)
    {
        $response = $this->httpClient->send($this->createHttpRequest($update));
        $result = true;
        if (!$response->isOk()) {
            error_log($response->getBody());
            $result = false;
        }

        return $result;
    }

    /**
     * @param  Update $update
     * @return RequestInterface
     */
    protected function createHttpRequest($update)
    {
        $headers = [
            'Content-Type: application/json',
            'Accept: application/vnd.heroku+json; version=3',
            sprintf('Authorization: Bearer %s', $this->config->getHerokuApiToken()),
        ];
        $endpoint = sprintf($this->config->getHerokuFormationEndpoint(), $update->getHerokuAppName(), $update->getHerokuDynoName());
        $payload = ['quantity' => $update->getHerokuDynoQty()];

        return new Request(RequestInterface::METHOD_PATCH, $endpoint, $headers, json_encode($payload));
    }

    /**
     * @param  Update $update
     * @return bool
     */
    public function isReadyForUpdate($update)
    {
        return in_array($this->config->getActualWeekDay(), $update->getActionDays())
            && in_array($this->config->getActualHour(), $update->getActionHours());
    }
}
