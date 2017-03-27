<?php

namespace Ptondereau\GoogleAddressConverter;

use Ptondereau\GoogleAddressConverter\Builders\AddressQueryBuilder;
use Ptondereau\GoogleAddressConverter\Builders\UrlBuilder;
use Ptondereau\GoogleAddressConverter\Http\HttpClient;

class GoogleMapsClient extends HttpClient
{
    /**
     * @var string Google maps api endpoint.
     */
    protected $url = 'https://maps.googleapis.com/maps/api/geocode/json';

    /**
     * @var string Your API KEY.
     */
    protected $apiKey;

    /**
     * GoogleMapsClient constructor.
     *
     * @param string                  $apiKey
     * @param \Http\Client\HttpClient $httpClient
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($apiKey, \Http\Client\HttpClient $httpClient = null)
    {
        if (!$apiKey) {
            throw new \InvalidArgumentException('API Key is mandatory');
        }

        $this->apiKey = $apiKey;
        parent::__construct($httpClient);
    }

    /**
     * Get an array of longitude and latitude.
     *
     * @param Address $address
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getLatLong(Address $address)
    {
        $url = UrlBuilder::createUrl($this->url, $this->apiKey, AddressQueryBuilder::createFromAddress($address));

        $response = json_decode($this->get($url), true);

        if (
            !isset($response['results'][0]['geometry']['location']['lat'])
            && !isset($response['results'][0]['geometry']['location']['lng'])
        ) {
            throw new \InvalidArgumentException('Address parameters are wrong!');
        }

        return [
            'lat' => $response['results'][0]['geometry']['location']['lat'],
            'lng' => $response['results'][0]['geometry']['location']['lng'],
        ];
    }
}
