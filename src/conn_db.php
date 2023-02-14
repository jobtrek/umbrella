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

    $stmt3 = $con->query("SELECT (name_activity) name_activity, tae.activity_id, environ_name, score 
FROM t_activity
JOIN t_activity_weather taw on t_activity.activity_id = taw.activity_id
JOIN t_weather tw on tw.weather_id = taw.weather_id
JOIN t_activity_season tas on t_activity.activity_id = tas.activity_id
JOIN t_season ts on ts.season_id = tas.season_id
JOIN t_activity_environ tae on t_activity.activity_id = tae.activity_id
JOIN t_environ te on te.environ_id = tae.environ_id
    WHERE tw.name_weather = '$temperature_current_weather' 

AND score > 3
 
ORDER BY random()
    
LIMIT 6 

");
    $activity = $stmt3->fetchAll(\PDO::FETCH_CLASS, Activity::class);
}







