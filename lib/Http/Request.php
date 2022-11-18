<?php

namespace DynoLib\Http;

class Request implements RequestInterface
{

    /**
     * @var string
     */
    protected $method;
    /**
     * @var string
     */
    protected $uri;
    /**
     * @var array
     */
    protected $headers;
    /**
     * @var string
     */
    protected $body;

    /**
     * @param string $method
     * @param string $uri
     * @param array  $headers
     * @param string $body
     */
    public function __construct($method, $uri, $headers = [], $body = '')
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
}