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
    public function __construct(string $login, string $password)
    {
    }

    public function team(): Team
    {
        return new Team();
    }

    public function user(): User
    {
        return new User();
    }

    public function folder(): Folder
    {
        return new Folder();
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
