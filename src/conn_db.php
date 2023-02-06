<?php

namespace Umbrella\Admin;

require "../vendor/autoload.php";

require "../src/conn_api.php";

if ($city_name != null) {


    $host = "localhost";
    $port = "5432";
    $db = "umbrella";
    $user = "postgres";
    $pass = "postgres";


    $con = new \PDO("pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pass");
    $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);


// query for weather, compare weather of API to database

    $stmt = $con->query("SELECT * FROM t_weather WHERE name_weather = '$temperature_current_weather'");
    $weather = $stmt->fetchAll(\PDO::FETCH_CLASS, Weather::class);

// query for select activity with weather with score > 3

    $stmt2 = $con->query("SELECT  t_activity.name_activity FROM t_weather INNER JOIN t_activity_weather ON t_activity_weather.weather_id = t_weather.weather_id INNER JOIN t_activity ON t_activity_weather.activity_id = t_activity.activity_id  WHERE t_weather.name_weather = '$temperature_current_weather' AND score > 3 ORDER BY score");
    $activity = $stmt2->fetchAll(\PDO::FETCH_CLASS, Activity::class);


    print_r($activity[0]);
    print_r($activity[1]);
    print_r($activity[2]);
    print_r($activity[3]);
    print_r($activity[4]);

    print_r($weather);
}









