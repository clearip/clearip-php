<?php
namespace Clearip;

use GuzzleHttp\Exception\RequestException;

class Client
{

    protected $apikey;
    public function __construct(String $apiKey)
    {

        if (empty($apiKey)) {
            throw new \Exception(
                'api key is required'
            );
        }

        $this->apiKey = $apiKey;
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.clearip.io',
        ]);

    }

    public function getIpinfo($ip)
    {

        if (!preg_match('/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/', $ip)) {
            throw new \Exception('ip is required');
        }

        try {
            $res = $this->httpClient->get("/ip/" . $ip . "/json?apikey=" . $this->apiKey);
            return json_decode($res->getBody());

        } catch (RequestException $e) {
            throw new \Exception(
                'request error'
            );
        }

    }
}
