<?php

namespace Ptondereau\GoogleAddressConverter\Http;

use GuzzleHttp\Psr7\Request;
use Http\Client\HttpClient as Client;
use Http\Discovery\HttpClientDiscovery;
use Ptondereau\GoogleAddressConverter\Address;

abstract class HttpClient
{
    /**
     * @var Client Client HTTP.
     */
    protected $httpClient;

    /**
     * Client constructor.
     *
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient = null)
    {
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
    }

    /**
     * Send GET HTTP to a given endpoint.
     *
     * @param null|string $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($uri = null)
    {
        $request = new Request('GET', $uri);

        return $this->httpClient->sendRequest($request);
    }

    abstract public function getLatLong(Address $address);

}
