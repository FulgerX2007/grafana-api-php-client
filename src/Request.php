<?php

namespace FulgerX2007\Grafana;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

final class Request
{
    /** @var string */
    private const CONTENT_TYPE = 'application/json';

    /** @var Http */
    private static $request;
    /** @var non-empty-array<string> */
    private static $headers;
    /** @var string */
    private static $grafana_url;

    public function __construct(string $credential, string $grafana_url)
    {
        self::$grafana_url = $grafana_url;
        self::$headers = [
            'Authorization' => 'Basic ' . $credential,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
        self::$request = new Http();
    }

    public static function post(string $uri, string $content): Response
    {
        return self::$request::withHeaders(self::$headers)
            ->withBody($content, self::CONTENT_TYPE)->post(self::$grafana_url . $uri);
    }

    public static function put(string $uri, string $content): Response
    {
        return self::$request::withHeaders(self::$headers)
            ->withBody($content, self::CONTENT_TYPE)->put(self::$grafana_url . $uri);
    }

    public static function delete(string $uri): Response
    {
        return self::$request::withHeaders(self::$headers)->delete(self::$grafana_url . $uri);
    }

    public static function get(string $uri): Response
    {
        return self::$request::withHeaders(self::$headers)->get(self::$grafana_url . $uri);
    }
}
