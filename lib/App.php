<?php

namespace DynoLib;

class App
{
    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @return int
     * @throws \Exception
     */
    public function run(array $argv = [])
    {
        $command = $this->factory->createCommand($argv);
        $processor = $this->factory->createHerokuProcessor($command->getHerokuApiToken());
        $message = "skipped \n";
        $result = true;
        if ($processor->isReadyForUpdate($command->getActionDay(), $command->getActionHour())) {
            $result = $processor->updateDynoQty(
                $command->getHerokuAppName(),
                $command->getHerokuDynoName(),
                $command->getHerokuDynoQty()
            );

            $message = $result
                ? sprintf("New qty of %s dyno for %s app is: %d \n", $command->getHerokuAppName(), $command->getHerokuDynoName(), $command->getHerokuDynoQty())
                : "fail\n";
        }
        echo $message;

        return $result ? 0 : 1;
    }

    /**
     * @param Factory $factory
     * 
     * @return void
     */
    public function setFactory($factory)
    {
        $this->factory = $factory;
    }
}
