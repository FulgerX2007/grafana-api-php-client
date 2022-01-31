<?php

namespace FulgerX2007\Grafana;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

final class Request
{
    /** @var Client */
    private static $request;
    /** @var non-empty-array<string> */
    private static $headers;
    /** @var string */
    private static $grafana_url;

    public function __construct(string $credential, string $grafana_url)
    {
        self::$grafana_url = $grafana_url;
        self::$request = new Client();
        self::$headers = [
            'Authorization' => 'Basic ' . $credential,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public static function request(): Client
    {
        return new Client();
    }

    public static function post(string $uri, string $content): ResponseInterface
    {
        try {
            $response = self::$request->post(
                self::$grafana_url . $uri,
                [
                    'headers' => self::$headers,
                    'body' => $content
                ]
            );
        } catch (ClientException $exception) {
            return $exception->getResponse();
        }

        return $response;
    }

    public static function put(string $uri, string $content): ResponseInterface
    {
        try {
            $response = self::$request->put(
                self::$grafana_url . $uri,
                [
                    'headers' => self::$headers,
                    'body' => $content
                ]
            );
        } catch (ClientException $exception) {
            return $exception->getResponse();
        }

        return $response;
    }

    public static function delete(string $uri): ResponseInterface
    {
        try {
            $response = self::$request->delete(
                self::$grafana_url . $uri,
                [
                    'headers' => self::$headers
                ]
            );
        } catch (ClientException $exception) {
            return $exception->getResponse();
        }

        return $response;
    }

    public static function get(string $uri): ResponseInterface
    {
        try {
            $response = self::$request->get(
                self::$grafana_url . $uri,
                [
                    'headers' => self::$headers
                ]
            );
        } catch (ClientException $exception) {
            return $exception->getResponse();
        }

        return $response;
    }
}
