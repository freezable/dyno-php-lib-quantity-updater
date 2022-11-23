<?php

namespace DynoLib\Http;

use Exception;

interface ClientInterface
{
    /**
     * @param  RequestInterface $request
     * @return ResponseInterface
     * @throws Exception
     */
    public function send($request);
}