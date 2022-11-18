<?php

namespace DynoLib;

class App
{
    /**
     * @var Factory
     */
    protected $factory;

    public function __construct()
    {
        $this->factory = new Factory();
    }

    /**
     * @return Result
     * @throws \Exception
     */
    public function run()
    {
        $processor = $this->factory->createHerokuProcessor();
        $update = $this->factory->createUpdate();

        if (!$processor->isReadyForUpdate($update)) {
            return new Result(true, "skipped \n");
        }

        $result = $processor->updateDynoQty($update);
        $message = $result
            ? sprintf("New qty of %s dyno for %s app is: %d \n", $update->getHerokuAppName(), $update->getHerokuDynoName(), $update->getHerokuDynoQty())
            : "fail\n";

        return new Result($result, $message);
    }

}
