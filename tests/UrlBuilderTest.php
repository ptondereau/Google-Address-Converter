<?php

namespace Ptondereau\Test\GoogleAddressConverter;

use Ptondereau\GoogleAddressConverter\Builders\UrlBuilder;

class UrlBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testThatAGoodUrlShouldBeGenerated()
    {
        $url = UrlBuilder::createUrl('http://test.com', 'key', 'address=address1');

        $this->assertSame('http://test.com?address=address1&key=key', $url);
    }
}
