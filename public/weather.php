<?php

require "../vendor/autoload.php";

//pour la key of API
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

require "../src/conn_api.php";

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="main.css" rel="stylesheet">
    <title>Umbrella</title>
</head>

<body>

<h1 class="text-3xl font-bold underline">
    Hello world!
</h1>

<p> La température actuelle à <?= $temperature_current_name; ?> est de <?= $temperature_in_celsius; ?> degrés
    celsius. </p>
<p> <?= $temperature_current_weather; ?> </p>
<p> <?= $affichage_icon ?> </p>
<p> vitesse du vent <?= $temperature_current_wind ?> </p>
<p> description : <?= $temperature_current_weather_description; ?> </p>
<p> humidity : <?= $temperature_current_main_humidity; ?> </p>
<p> pressure : <?= $temperature_current_main_pressure; ?> </p>
<p> nuages : <?= $temperature_current_clouds; ?>%</p>
<p> temp max : : <?= $temperature_max_in_celsius; ?></p>
<p> temp min : <?= $temperature_min_in_celsius; ?></p>
<p> ressentis : <?= $temperature_feels_in_celsius; ?></p>


</body>

</html>