<?php

namespace DynoLib\Http;

class Response implements ResponseInterface
{
    /**
     * @var int
     */
    protected $statusCode;
    /**
     * @var string
     */
    protected $body;

    /**
     * @param int    $statusCode
     * @param string $body
     */
    public function __construct($statusCode, $body = '')
    {
        $this->statusCode = $statusCode;
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return bool
     */
    public function isOk()
    {
        return $this->statusCode >= self::HTTP_OK && $this->statusCode <= self::HTTP_ACCEPTED;
    }
}