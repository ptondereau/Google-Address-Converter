<?php

namespace Ptondereau\GoogleAddressConverter\Builders;

use Ptondereau\GoogleAddressConverter\Address;

class AddressQueryBuilder
{
    public static function createFromAddress(Address $address)
    {
        $addressLine = implode(' ', array_filter([
            $address->getAddressLine1(),
            $address->getAddressLine2(),
            $address->getAddressLine3(),
        ]));

        $fullCity = implode(' ', array_filter([
            $address->getZipCode(),
            $address->getCity(),
        ]));

        return self::generateQuery([
            $addressLine,
            $fullCity,
            $address->getCountry(),
        ]);
    }

    /**
     * @param array $elements
     *
     * @return string
     */
    protected static function generateQuery(array $elements = [])
    {
        return http_build_query(['address' => implode(', ', array_filter($elements))]);
    }
}
