<?php

namespace DynoLib\Heroku;

use DynoLib\DateHelper;

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
        $payload = ['quantity' => $qty];
        $response = $this->connector->makeRequest($endpoint, Connector::METHOD_PATCH, $payload);
        $result = $response['code'] == Connector::HTTP_OK;
        if(!$result){
            error_log($response['content']);
        }

        return $result;
    }

    /**
     * @param string $day
     * @param int $hour
     * @return bool
     * @SuppressWarnings("static")
     */
    public function isReadyForUpdate($day, $hour)
    {
        return DateHelper::getActualWeekDay() === $day 
            && DateHelper::getActualHour() === intval($hour);
    }
}
