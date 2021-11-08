<?php

namespace DynoLib\Heroku;

use Exception;

class Connector
{
    const BASE_URI = 'https://api.heroku.com';
    const FORMATION_ENDPOINT = 'apps/%s/formation/%s';
    const METHOD_PATCH = 'PATCH';
    /**
     * @var string
     */
    protected $token;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @param string $endpoint
     * @param string $method
     * @param array $payload
     * @return string[]
     * @throws Exception
     */
    public function makeRequest($endpoint, $method, $payload = [])
    {
        $headers = [
            'Content-Type: application/json',
            'Accept: application/vnd.heroku+json; version=3',
            sprintf('Authorization: Bearer %s', $this->token),
        ];
        $options = [
            CURLOPT_URL => sprintf('%s/%s', self::BASE_URI, $endpoint),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers,
        ];
        if (!empty($payload)) {
            $options[CURLOPT_POSTFIELDS] = json_encode($payload);
        }

        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $content = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if (curl_errno($curl)) {
            throw new Exception(curl_error($curl), curl_errno($curl));
        }
        curl_close($curl);

        return [
            'content' => $content,
            'code' => $code,
        ];
    }
}
