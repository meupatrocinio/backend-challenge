<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class LegacyApiHandler
{

    protected string $url;

    public function __construct()
    {
        $this->url = Config::get('app.legacy_api_url');
    }

    public function allItems($nRequests, $methodUrl = '/items')
    {
        try {
            return self::handleRequest($this->url . $methodUrl, $nRequests);
        } catch (Exception $ex) {
            return [ false, $ex->getMessage() ];
        }
    }

    protected static function handleRequest($url, $nRequests, $page = 1, $items = [])
    {
        $response = Http::get($url . "?page=" . $page);
        $response = json_decode($response->getBody());

        $items = array_merge($items, $response->data);
        $page += 1;
        $nRequests -= 1;
        if ($nRequests > 0)
        {
            return self::handleRequest($url, $nRequests, $page, $items);
        }

        return $items;
    }
}