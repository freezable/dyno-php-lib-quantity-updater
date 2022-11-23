<?php

namespace DynoLib;

use DynoLib\Http\Client;
use DynoLib\Http\ClientInterface;

class Factory
{
    /**
     * @return Processor
     */
    public function createHerokuProcessor()
    {
        return new Processor($this->createHttpClient(), $this->createConfig());
    }

    /**
     * @return ClientInterface
     */
    public function createHttpClient()
    {
        return new Client();
    }

    /**
     * @SuppressWarnings(PHPMD)
     * @return Config
     */
    public function createConfig()
    {
        return new Config($_SERVER['argv'], $_ENV);
    }

    /**
     * @return Update
     */
    public function createUpdate()
    {
        return new Update($this->createConfig());
    }
}
