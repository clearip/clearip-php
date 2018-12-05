<?php
namespace Clearip;

use GuzzleHttp\Exception\RequestException;

class Client
{

    protected $apikey;

    /**
     * construct the clearip client and Guzzle httpClient
     *
     * @param String $apiKey
     */
    public function __construct($apiKey, HttpClientInterface $client = null)
    {

        if (empty($apiKey)) {
            throw new \Exception(
                'api key required'
            );
        }

        $this->apiKey = $apiKey;
        $this->newHttpClient = ($client) ?: new HttpClient($apiKey);

        $this->IPInfoApi = new IPInfoApi($this->newHttpClient);

    }

}
