<?php

namespace DynoLib;

class Update
{
    const HEROKU_APP_NAME_ARG_KEY = 2;
    const HEROKU_DYNO_NAME_ARG_KEY = 3;
    const HEROKU_DYNO_QTY_ARG_KEY = 4;
    const ACTION_DAY_ARG_KEY = 5;
    const ACTION_HOUR_ARG_KEY = 6;
    /**
     * @var Config
     */
    protected $config;

    /**
     * @param Config $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @return string|null
     */
    public function getHerokuAppName()
    {
        return $this->config->getArgValue(self::HEROKU_APP_NAME_ARG_KEY);
    }

    /**
     * @return string|null
     */
    public function getHerokuDynoName()
    {
        return $this->config->getArgValue(self::HEROKU_DYNO_NAME_ARG_KEY);
    }

    /**
     * @return int|null
     */
    public function getHerokuDynoQty()
    {
        $qty = $this->config->getArgValue(self::HEROKU_DYNO_QTY_ARG_KEY);

        return $qty !== null ? intval($qty) : null;
    }

    /**
     * @return string[]
     */
    public function getActionDays()
    {
        $days = $this->config->getArgValue(self::ACTION_DAY_ARG_KEY);

        return $days !== null
            ? explode(',', $days)
            : [$this->config->getActualWeekDay()];
    }

    /**
     * @return int[]
     */
    public function getActionHours()
    {
        $hours = $this->config->getArgValue(self::ACTION_HOUR_ARG_KEY);
        $actionHours = [$this->config->getActualHour()];
        if ($hours !== null) {
            $actionHours = array_map(
                function ($hour) {
                    return intval($hour);
                }, explode(',', $hours)
            );
        }

        return $actionHours;
    }
}