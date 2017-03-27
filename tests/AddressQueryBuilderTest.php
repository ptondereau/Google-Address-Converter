<?php

namespace Ptondereau\Test\GoogleAddressConverter;

use Ptondereau\GoogleAddressConverter\Address;
use Ptondereau\GoogleAddressConverter\Builders\AddressQueryBuilder;

class AddressQueryBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testThatAnAddressShouldBeQueryfied()
    {
        $address = (new Address())
            ->setAddressLine1('address1')
            ->setAddressLine2('address2')
            ->setAddressLine3('address3')
            ->setCity('city')
            ->setZipCode('zip')
            ->setCountry('country');


        $query = AddressQueryBuilder::createFromAddress($address);

        $this->assertSame('address=address1+address2+address3%2C+zip+city%2C+country', $query);
    }
}
