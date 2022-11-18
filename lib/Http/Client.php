<?php

namespace DynoLib\Http;

use Exception;

class Client implements ClientInterface
{

    /**
     * @param  RequestInterface $request
     * @return ResponseInterface
     * @throws Exception
     */
    public function send($request)
    {
        $options = [
            CURLOPT_URL => $request->getUri(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $request->getMethod(),
            CURLOPT_HTTPHEADER => $request->getHeaders(),
        ];
        if (!empty($request->getBody())) {
            $options[CURLOPT_POSTFIELDS] = $request->getBody();
        }

        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $content = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if (curl_errno($curl)) {
            throw new Exception(curl_error($curl), curl_errno($curl));
        }
        curl_close($curl);

        return new Response($code, $content);
    }
}