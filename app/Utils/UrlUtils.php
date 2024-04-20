<?php

namespace App\Utils;

class UrlUtils
{
    public static function getSubdomain(): string
    {
        $host = request()->getHost();
        $hostParts = explode('.', $host);

        return $hostParts[0];
    }
}
