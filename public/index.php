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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="main.css" rel="stylesheet">
    <title>Umbrella</title>
</head>

<body>
<div class="navbar bg-primary">
    <div class="flex-none">
        <button class="btn btn-square btn-ghost">
            <img src="./images/logo-image.png" alt="">        </button>
    </div>
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl">Umbrella</a>
    </div>
</div>
</body>

</html>