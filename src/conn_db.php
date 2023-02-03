<?php
require "../vendor/autoload.php";

require "../src/conn_api.php";


$host = "localhost";
$port = "5432";
$db = "umbrella";
$user = "postgres";
$pass = "postgres";


$con =  new \PDO("pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pass");
$con ->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

class Activity{

    public int $activity_id;
    public string $activity_name;
}
class Weather{

    public int $weather_id;
    public string $weather_name;
}

// query for weather, compare weather of API to database

$stmt2 = $con->query("SELECT * FROM t_weather WHERE name_weather = '$temperature_current_weather'");
$weather = $stmt2->fetchAll(\PDO::FETCH_CLASS, \Weather::class);

// query for activity

/*$stmt = $con->query('SELECT * FROM "t_activity" WHERE name_activity = 1');
$activity = $stmt->fetchAll(\PDO::FETCH_CLASS, \Activity::class);*/



$stmt = $con->query( 'SELECT t_activity.name_activity,activity_id FROM t_activity INNER JOIN t_weather ON t_activity INNER join ');
$activity = $stmt->fetchAll(\PDO::FETCH_CLASS, \Activity::class);

print_r($weather);
print_r($activity);
var_dump($temperature_current_weather);



?>
