<?php

namespace FulgerX2007\Grafana\Api;

use FulgerX2007\Grafana\Entity\Team as TeamEntity;
use FulgerX2007\Grafana\Request;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use JsonException;

class Team
{
    /** @var Request */
    private static $request;

    public function __construct(Request $request)
    {
        self::$request = $request;
    }

    public function add(TeamEntity $team): Response
    {
        $uri = '/api/teams';
        return self::$request::post($uri, $team->getJson());
    }

    public function update(int $team_id, TeamEntity $team): Response
    {
        $uri = '/api/teams/' . $team_id;
        return self::$request::put($uri, $team->getJson());
    }

    public function delete(int $team_id): Response
    {
        $uri = '/api/teams/' . $team_id;
        return self::$request::delete($uri);
    }

    public function get(int $team_id): Response
    {
        $uri = '/api/teams/' . $team_id;
        return self::$request::get($uri);
    }

    public function addMember(int $team_id, int $user_id): Response
    {
        $uri = '/api/teams/' . $team_id . '/members';
        $content = '{"userId": ' . $user_id . '}';

        return self::$request::post($uri, $content);
    }

    public function getMembers(int $team_id): Response
    {
        $uri = '/api/teams/' . $team_id . '/members';

        return self::$request::get($uri);
    }

    public function removeMember(int $team_id, int $user_id): Response
    {
        $uri = '/api/teams/' . $team_id . '/members/' . $user_id;
        return self::$request::delete($uri);
    }
}
