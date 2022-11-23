<?php

namespace DynoLib\Http;

interface RequestInterface
{
    const METHOD_PATCH = 'PATCH';

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getUri();

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @return string
     */
    public function getBody();
}