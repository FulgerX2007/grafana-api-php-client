<?php

namespace FulgerX2007\Grafana\Entity;

use FulgerX2007\Grafana\Interfaces\Arrayable;
use FulgerX2007\Grafana\Interfaces\Jsonable;
use JsonException;

class Team implements Jsonable, Arrayable
{
    /** @var string */
    private $name;
    /** @var string */
    private $email;
    /** @var int */
    private $org_id;

    public function __construct(string $name, string $email = '', int $org_id = 1)
    {
        $this->name = $name;
        $this->email = $email;
        $this->org_id = $org_id;
    }

    /**
     * @throws JsonException
     */
    public function getJson(): string
    {
        $data = ['name' => $this->name, 'email' => $this->email, 'orgId' => $this->org_id];

        return json_encode($data, JSON_THROW_ON_ERROR);
    }

    /**
     * @return array<string,int|string>
     */
    public function getArray(): array
    {
        return ['name' => $this->name, 'email' => $this->email, 'orgId' => $this->org_id];
    }
}
