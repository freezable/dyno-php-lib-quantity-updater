<?php

namespace DynoLib;

use DynoLib\Heroku\Connector;

class App
{
    /**
     * @return int
     * @throws \Exception
     */
    public function run(array $argv = [])
    {
        $token = $argv[1];
        $appName = $argv[2];
        $dynoName = $argv[3];
        $qty = $argv[4];
        $result = true;
        $message = "skipped \n";
        if ($this->IsReadyForUpdate($argv[5], $argv[6])) {
            $herokuConnector = new Connector($token);
            $result = $herokuConnector->setDynoQty($appName, $dynoName, $qty);
            $message = $result ? sprintf("new qty of %s dyno for %s app is: %d \n", $dynoName, $appName, $qty) : "fail\n";
        }
        echo $message;

        return $result ? 0 : 1;
    }

    /**
     * @param $day
     * @param $hour
     * @return bool
     */
    protected function IsReadyForUpdate($day, $hour)
    {
        $actualDay = date('D');
        $actualHour = intval(date('G')) + 1;

        return $actualDay === $day && $actualHour === intval($hour);
    }
}
