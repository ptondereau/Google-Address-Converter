<?php

namespace Ptondereau\GoogleAddressConverter\Builders;

use Ptondereau\GoogleAddressConverter\Address;

class AddressQueryBuilder
{
    public static function createFromAddress(Address $address)
    {
        return self::generateQuery([
            $address->getAddressLine1(),
            $address->getAddressLine2(),
            $address->getAddressLine3(),
            $address->getCity(),
            $address->getZipCode(),
        ]);
    }

    /**
     * @param array $elements
     *
     * @return string
     */
    protected static function generateQuery(array $elements = [])
    {
        return http_build_query(['address' => array_filter($elements)]);
    }
}
