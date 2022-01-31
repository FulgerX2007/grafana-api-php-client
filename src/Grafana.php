<?php

namespace FulgerX2007\Grafana;

use FulgerX2007\Grafana\Api\Dashboard;
use FulgerX2007\Grafana\Api\DashboardPermission;
use FulgerX2007\Grafana\Api\Folder;
use FulgerX2007\Grafana\Api\FolderPermission;
use FulgerX2007\Grafana\Api\Team;
use FulgerX2007\Grafana\Api\User;

class Grafana
{
    /** @var Request */
    protected static $request;

    public function __construct(
        string $login = 'admin',
        string $password = 'admin',
        string $grafana_url = 'http://localhost:3000'
    ) {
        $credential = base64_encode($login . ':' . $password);
        self::$request = new Request($credential, $grafana_url);
    }

    public function team(): Team
    {
        return new Team(self::$request);
    }

    public function user(): User
    {
        return new User();
    }

    public function folder(): Folder
    {
        return new Folder(self::$request);
    }

    public function folderPermission(): FolderPermission
    {
        return new FolderPermission();
    }

    public function dashboard(): Dashboard
    {
        return new Dashboard();
    }

    public function dashboardPermission(): DashboardPermission
    {
        return new DashboardPermission();
    }
}
