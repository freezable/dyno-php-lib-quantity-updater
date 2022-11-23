<?php

namespace DynoLib;

class Result
{
    const SUCCESS = 0;
    const FAIL = 1;
    /**
     * @var bool
     */
    protected $success;
    /**
     * @var mixed|string
     */
    protected $message;
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @param bool $success
     * @param string $message
     */
    public function __construct($success, $message = '')
    {
        $this->success = $success;
        $this->message = $message;
        $this->statusCode = $success ? self::SUCCESS : self::FAIL;
    }

    /**
     * @return mixed
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @return mixed|string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}