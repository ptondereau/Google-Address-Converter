<?php

namespace Ptondereau\Test\GoogleAddressConverter;

use Ptondereau\GoogleAddressConverter\Address;

class AddressTest extends \PHPUnit_Framework_TestCase
{

    public function testSettersAndGetters()
    {
        $address = new Address();

        $this->assertSame($address, $address->setAddressLine1('test1'));
        $this->assertSame($address, $address->setAddressLine2('test2'));
        $this->assertSame($address, $address->setAddressLine3('test3'));
        $this->assertSame($address, $address->setCity('city'));
        $this->assertSame($address, $address->setZipCode('zipcode'));

        $this->assertSame('test1', $address->getAddressLine1());
        $this->assertSame('test2', $address->getAddressLine2());
        $this->assertSame('test3', $address->getAddressLine3());
        $this->assertSame('city', $address->getCity());
        $this->assertSame('zipcode', $address->getZipCode());
    }
}
