# Grafana API 

### How to use
**Example**
```php
$login = 'admin';
$password = 'admin';
$grafana_url = 'http://localhost:3000';

$grafana  = new FulgerX2007\Grafana\Grafana($login, $password, $grafana_url);

$team_title = 'Marketing';
$team_email = 'marketing@@company.org'; // is optional
$team_org_id = 1; // by default is 1

$team = new \FulgerX2007\Grafana\Entity\Team($team_title, $team_email, $team_org_id);

$response = $grafana->team()->add($team);

```
