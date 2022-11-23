<?php

namespace DynoLib;

class Config
{
    const HEROKU_API_TOKEN_ARG_KEY = 1;
    const WEEK_DATE_DATE_FORMAT = 'D';
    const HOUR_DATE_FORMAT = 'G';
    const FORMATION_ENDPOINT = 'https://api.heroku.com/apps/%s/formation/%s';
    /**
     * @var array|string[]
     */
    protected $argv;
    /**
     * @var array
     */
    protected $env;

    /**
     * @param array $argv
     * @param array $env
     */
    public function __construct($argv, $env)
    {
        $this->argv = $argv;
        $this->env = $env;
    }

    /**
     * @return string|null
     */
    public function getHerokuApiToken()
    {
        return isset($this->env['HEROKU_API_TOKEN'])
            ? $this->env['HEROKU_API_TOKEN']
            : $this->getArgValue(self::HEROKU_API_TOKEN_ARG_KEY);
    }

    /**
     * @return string
     */
    public function getHerokuFormationEndpoint()
    {
        return self::FORMATION_ENDPOINT;
    }

    /**
     * @param int $key
     *
     * @return string|int|null
     */
    public function getArgValue($key)
    {
        return array_key_exists($key, $this->argv) ? trim($this->argv[$key]) : null;
    }

    /**
     * @return string
     */
    public function getActualWeekDay()
    {
        return $this->getDate(self::WEEK_DATE_DATE_FORMAT);
    }

    /**
     * @return int
     */
    public function getActualHour()
    {
        return intval($this->getDate(self::HOUR_DATE_FORMAT)) + 1;
    }

    /**
     * @param  string $format
     * @return false|string
     */
    protected function getDate($format)
    {
        return date($format);
    }
}