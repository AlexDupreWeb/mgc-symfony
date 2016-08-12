<?php

namespace AppBundle\Utils;

class PaginationCleaner
{
    public static function getCurrentUrl($url){
        $current = explode('?', $url);
        $current = $current[0];

        return $current;
    }

    public static function getCurrentParams($params){
        $current = $params;
        $current = http_build_query($current, '', '&');

        return $current;
    }
}