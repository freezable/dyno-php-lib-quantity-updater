<?php

namespace DynoLib;

use DynoLib\Heroku\Connector;
use DynoLib\Heroku\Processor;

class Factory
{
    /**
     * @return App
     */
    public function createApp()
    {
        $app = new App();
        $app->setFactory($this);

        return $app;
    }

    /**
     * @param string $token
     * 
     * @return Connector
     */
    protected function createHerokuConnector($token)
    {
        return new Connector($token);
    }

    /**
     * @param string $token
     * 
     * @return Processor
     */
    public function createHerokuProcessor($token)
    {
        return new Processor($this->createHerokuConnector($token));
    }

    /**
     * @param array $argv
     * 
     * @return Command
     */
    public function createCommand($argv)
    {
        return new Command($argv);
    }
}
