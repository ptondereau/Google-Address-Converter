<?php

namespace Ptondereau\GoogleAddressConverter\Builders;

class UrlBuilder
{
    public static function createUrl($url, $key, $addressQuery)
    {
        return $url.'?'.$addressQuery.'&'.http_build_query(['key' => $key]);
    }
}
