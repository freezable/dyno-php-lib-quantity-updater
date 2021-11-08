<?php

namespace DynoLib;

class Command
{
    const HEROKU_API_TOKEN_ARG_KEY = 1;
    const HEROKU_APP_NAME_ARG_KEY = 2;
    const HEROKU_DYNO_NAME_ARG_KEY = 3;
    const HEROKU_DYNO_QTY_ARG_KEY = 4;
    const ACTION_DAY_ARG_KEY = 5;
    const ACTION_HOUR_ARG_KEY = 6;

    /**
     * @var array|string[]
     */
    protected $argv;

    /**
     * @param array|string[] $argv
     */
    public function __construct($argv)
    {
        $this->argv = $argv;
    }

    /**
     * @return string|null
     */
    public function getHerokuApiToken()
    {
        return $this->getArgValue(self::HEROKU_API_TOKEN_ARG_KEY);
    }

    /**
     * @return string|null
     */
    public function getHerokuAppName()
    {
        return $this->getArgValue(self::HEROKU_APP_NAME_ARG_KEY);
    }

    /**
     * @return string|null
     */
    public function getHerokuDynoName()
    {
        return $this->getArgValue(self::HEROKU_DYNO_NAME_ARG_KEY);
    }

    /**
     * @return int|null
     */
    public function getHerokuDynoQty()
    {
        $qty = $this->getArgValue(self::HEROKU_DYNO_QTY_ARG_KEY);

        return $qty !== null ? intval($qty) : null;
    }

    /**
     * @return string|null
     */
    public function getActionDay()
    {
        $day = $this->getArgValue(self::ACTION_DAY_ARG_KEY);

        return $day !== null ? $day : DateHelper::getActualWeekDay();
    }

    /**
     * @return string|null
     */
    public function getActionHour()
    {   
        $hour = $this->getArgValue(self::ACTION_HOUR_ARG_KEY);

        return $hour !== null ? $hour : DateHelper::getActualHour();
    }

    /**
     * @param int $key
     * 
     * @return string|int|null
     */
    protected function getArgValue($key)
    {
        return array_key_exists($key, $this->argv) ? trim($this->argv[$key]) : null;
    }
}
