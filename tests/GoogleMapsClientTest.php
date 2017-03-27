<?php

namespace Ptondereau\Test\GoogleAddressConverter;

use GuzzleHttp\Psr7\Response;
use Http\Mock\Client;
use Ptondereau\GoogleAddressConverter\Address;
use Ptondereau\GoogleAddressConverter\GoogleMapsClient;
use Ptondereau\GoogleAddressConverter\Http\HttpClient;

class GoogleMapsClientTest extends \PHPUnit_Framework_TestCase
{
    public function testGoodConstruct()
    {
        $client = new GoogleMapsClient('key');
        $this->assertInstanceOf(GoogleMapsClient::class, $client);
        $this->assertInstanceOf(HttpClient::class, $client);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage API Key is mandatory
     */
    public function testThatConstructorShouldThrowExceptionWhenNoApiKeyIsProvided()
    {
        new GoogleMapsClient(null);
    }

    public function testItShouldGetLatLong()
    {
        $response = new Response(200, [], json_encode([
            'results' => [
                ['geometry' => ['location' => ['lat' => 20, 'lng' => 20]]],
            ]
        ]));
        $httpClient = new Client();
        $httpClient->addResponse($response);

        $client = new GoogleMapsClient('key', $httpClient);
        $address = (new Address())
            ->setAddressLine1('address1')
            ->setAddressLine2('address2')
            ->setAddressLine3('address3')
            ->setCity('city')
            ->setZipCode('zip');

        $this->assertSame(['lat' => 20, 'lng' => 20], $client->getLatLong($address));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Address parameters are wrong!
     */
    public function testItShouldThrowAnExceptionOnAddressError()
    {
        $response = new Response(200, [], json_encode([
            'results' => []
        ]));
        $httpClient = new Client();
        $httpClient->addResponse($response);

        $client = new GoogleMapsClient('key', $httpClient);
        $address = (new Address())
            ->setAddressLine1('wrong')
            ->setAddressLine2('address2')
            ->setAddressLine3('address3')
            ->setCity('city')
            ->setZipCode('zip');

        $client->getLatLong($address);
    }
}
