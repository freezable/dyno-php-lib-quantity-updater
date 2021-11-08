<?php

namespace DynoLib\Heroku;

class Processor
{
    /**
     * @var Connector
     */
    protected $connector;

    /**
     * @param Connector $connector
     */
    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * @param string $appName
     * @param string $dynoName
     * @param int $qty
     * 
     * @return bool
     */
    public function updateDynoQty($appName, $dynoName, $qty)
    {
        $endpoint = sprintf(Connector::FORMATION_ENDPOINT, $appName, $dynoName);
        $payload = ['quantity' => intval($qty)];
        $response = $this->connector->makeRequest($endpoint, Connector::METHOD_PATCH, $payload);

        return $response['code'] == 200;
    }

    /**
     * @param string $day
     * @param int $hour
     * @return bool
     */
    public function isReadyForUpdate($day, $hour)
    {
        $actualDay = date('D');
        $actualHour = intval(date('G')) + 1;

        return $actualDay === $day && $actualHour === intval($hour);
    }
}
