<?php
require "../vendor/autoload.php";

//pour la key
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

require "../src/conn_api.php";

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/main.css" rel="stylesheet">
    <title>Umbrella</title>
</head>

<body>

    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>

    <p> La température actuelle à <?= $city_name; ?> est de <?= $temperature_in_celsius; ?> degrés celsius. </p>
    <p> <?= $temperature_current_weather; ?> </p>
    <p> <?= $affichage_icon ?> </p>
    <p> description : <?= $temperature_current_weather_description; ?> </p>


</body>

</html>