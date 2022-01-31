<?php

namespace FulgerX2007\Grafana\Api;

use FulgerX2007\Grafana\Entity\Folder as FolderEntity;
use FulgerX2007\Grafana\Request;
use JsonException;
use Psr\Http\Message\ResponseInterface;

class Folder
{
    /** @var Request */
    private static $request;

    public function __construct(Request $request)
    {
        self::$request = $request;
    }

    /**
     * @throws JsonException
     */
    public function add(FolderEntity $folder): ResponseInterface
    {
        $uri = '/api/folders';
        return self::$request::post($uri, $folder->getJson());
    }

    /**
     * @throws JsonException
     */
    public function update(string $uid, string $title): ResponseInterface
    {
        $uri = '/api/folders/' . $uid;
        $content = ['title' => $title, 'overwrite' => true];

        return self::$request::put($uri, json_encode($content, JSON_THROW_ON_ERROR));
    }

    public function delete(string $uid): ResponseInterface
    {
        $uri = '/api/folders/' . $uid;
        return self::$request::delete($uri);
    }

    public function get(string $uid): ResponseInterface
    {
        $uri = '/api/folders/' . $uid;
        return self::$request::get($uri);
    }
}
