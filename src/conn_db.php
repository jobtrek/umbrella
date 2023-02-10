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


// query for select activity with weather, season name with score > 3

    $stmt3 = $con->query("SELECT DISTINCT t_activity.name_activity,t_activity.activity_id,t_season.season_name, score,t_environ.environ_name
    FROM t_weather
    INNER JOIN t_activity_weather 
    ON t_activity_weather.weather_id = t_weather.weather_id 
    INNER JOIN t_activity 
    ON t_activity_weather.activity_id = t_activity.activity_id  
    INNER JOIN t_activity_season 
    ON t_activity_season.season_id = t_activity.activity_id 
    INNER JOIN t_season 
    ON t_activity_season.activity_id = t_activity.activity_id  
    INNER JOIN t_activity_environ 
    ON t_activity_environ.environ_id = t_activity.activity_id 
    INNER JOIN t_environ 
    ON t_activity_environ.activity_id = t_activity.activity_id  
/*    INNER JOIN t_activity_temperature 
    ON t_activity_temperature.temp_id = t_activity.activity_id 
    INNER JOIN t_temperature 
    ON t_activity_temperature.activity_id = t_activity.activity_id  
*/
    WHERE t_weather.name_weather = '$temperature_current_weather' 
    AND score > 2 
    ORDER BY score DESC ");
    $activity = $stmt3->fetchall(\PDO::FETCH_CLASS, Activity::class);
}







