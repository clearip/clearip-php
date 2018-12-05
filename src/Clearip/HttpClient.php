<?php
namespace Clearip;

use GuzzleHttp\Exception\RequestException;

class HttpClient implements HttpClientInterface
{

    protected $apikey;

    /**
     * construct the default http client
     *
     * @param String $apiKey
     */
    public function __construct(string $apiKey)
    {

        $this->apiKey = $apiKey;
        $this->baseUri = "https://api.clearip.io";

        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => $this->baseUri,
        ]);

    }

    /**
     * Get request
     *
     * @param String $ip
     * @return JSON||Exception
     */
    public function get(string $url)
    {

        try {
            $res = $this->httpClient->get($url . "?apikey=" . $this->apiKey);
            return $res->getBody();
        } catch (RequestException $e) {
            throw new \Exception(
                'request error'
            );
        }

    }
}
