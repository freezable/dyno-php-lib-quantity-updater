<?php

namespace DynoLib\Http;

interface ResponseInterface
{
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_ACCEPTED = 202;

    /**
     * @return int
     */
    public function getStatusCode();

    /**
     * @return string
     */
    public function getBody();

    /**
     * @return bool
     */
    public function isOk();
}