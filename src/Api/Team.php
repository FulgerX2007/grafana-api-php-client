<?php

namespace FulgerX2007\Grafana\Api;

use FulgerX2007\Grafana\Entity\Team as TeamEntity;
use FulgerX2007\Grafana\Request;
use JsonException;
use Psr\Http\Message\ResponseInterface;

class Team
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
    public function add(TeamEntity $team): ResponseInterface
    {
        $uri = '/api/teams';
        return self::$request::post($uri, $team->getJson());
    }

    /**
     * @throws JsonException
     */
    public function update(int $team_id, TeamEntity $team): ResponseInterface
    {
        $uri = '/api/teams/' . $team_id;
        return self::$request::put($uri, $team->getJson());
    }

    public function delete(int $team_id): ResponseInterface
    {
        $uri = '/api/teams/' . $team_id;
        return self::$request::delete($uri);
    }

    public function get(int $team_id): ResponseInterface
    {
        $uri = '/api/teams/' . $team_id;
        return self::$request::get($uri);
    }

    public function addMember(int $team_id, int $user_id): ResponseInterface
    {
        $uri = '/api/teams/' . $team_id . '/members';
        $content = '{"userId": ' . $user_id . '}';

        return self::$request::post($uri, $content);
    }

    public function getMembers(int $team_id): ResponseInterface
    {
        $uri = '/api/teams/' . $team_id . '/members';

        return self::$request::get($uri);
    }

    public function removeMember(int $team_id, int $user_id): ResponseInterface
    {
        $uri = '/api/teams/' . $team_id . '/members/' . $user_id;

        return self::$request::delete($uri);
    }
}
