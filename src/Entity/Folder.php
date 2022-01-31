<?php

namespace FulgerX2007\Grafana\Entity;

use Exception;
use FulgerX2007\Grafana\Interfaces\Arrayable;
use FulgerX2007\Grafana\Interfaces\Jsonable;
use JsonException;

class Folder implements Jsonable, Arrayable
{
    /** @var string */
    private $title;
    /** @var string */
    private $uid;

    /**
     * @throws Exception
     */
    public function __construct(string $title, string $uid = null)
    {
        $this->title = $title;
        $this->uid = $uid ?? $this->getRandomString();
    }

    /**
     * @throws JsonException
     */
    public function getJson(): string
    {
        $data = ['title' => $this->title, 'uid' => $this->uid];
        return json_encode($data, JSON_THROW_ON_ERROR);
    }

    /**
     * @return array<string>
     */
    public function getArray(): array
    {
        return ['title' => $this->title, 'uid' => $this->uid];
    }

    private function getRandomString(int $length = 10): string
    {
        return substr(md5((string)mt_rand()), 0, $length);
    }
}
