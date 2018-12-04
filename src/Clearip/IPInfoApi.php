<?php
namespace Clearip;


class IPInfoApi
{

    /**
     * construct the clearip client and Guzzle httpClient
     *
     * @param String $apiKey
     */
    public function __construct(HttpClientInterface $client)
    {

        $this->newHttpClient = $client;

    }

    /**
     * get ip info from clearip services
     *
     * @param String $ip
     * @return JSON||Exception
     */
    public function GetAllDataByIP($ip)
    {

        if (!preg_match('/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/', $ip)) {
            throw new \Exception('ip required');
        }

        try {
            $res = $this->newHttpClient->get("/ip/" . $ip . "/json");
            return json_decode($res->getBody());

        } catch (RequestException $e) {
            throw new \Exception(
                'request error'
            );
        }

    }
}
