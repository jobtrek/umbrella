<?php

use Umbrella\Admin;

require "../vendor/autoload.php";

//pour la key of API
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

require "../src/conn_api.php";
require "../src/conn_db.php";

require "./header.php";
?>

    <div class="card w-96 bg-base-100 shadow-xl ml-8 mt-10">
        <p> <?= $affichage_icon ?> </p>
        <div class="card-body">
            <p><?= $temperature_current_name; ?></p>
            <p> <?= $temperature_current_weather; ?> </p>
        </div>

        <div class="card-body bg-gradient-to-r from-indigo-200">

            <p> vitesse du vent <?= $temperature_current_wind ?> </p>
            <p> description : <?= $temperature_current_weather_description; ?> </p>
            <p> humidity : <?= $temperature_current_main_humidity; ?> </p>
            <p> pressure : <?= $temperature_current_main_pressure; ?> </p>
            <p> nuages : <?= $temperature_current_clouds; ?>%</p>
            <p> temp max : : <?= $temperature_max_in_celsius; ?></p>
            <p> temp min : <?= $temperature_min_in_celsius; ?></p>
            <p> ressentis : <?= $temperature_feels_in_celsius; ?></p>
        </div>
    </div>
    <!--<p> La température actuelle à <?php /*= $temperature_current_name; */ ?> est de <?php /*= $temperature_in_celsius; */ ?> degrés
    celsius. </p>
<p> <?php /*= $temperature_current_weather; */ ?> </p>
<p> <?php /*= $affichage_icon */ ?> </p>
<p> vitesse du vent <?php /*= $temperature_current_wind */ ?> </p>
<p> description : <?php /*= $temperature_current_weather_description; */ ?> </p>
<p> humidity : <?php /*= $temperature_current_main_humidity; */ ?> </p>
<p> pressure : <?php /*= $temperature_current_main_pressure; */ ?> </p>
<p> nuages : <?php /*= $temperature_current_clouds; */ ?>%</p>
<p> temp max : : <?php /*= $temperature_max_in_celsius; */ ?></p>
<p> temp min : <?php /*= $temperature_min_in_celsius; */ ?></p>
<p> ressentis : <?php /*= $temperature_feels_in_celsius; */ ?></p>-->
    <br><br>
    <div class="grid grid-cols-4 gap-4">

        <?php foreach ($activity as $activities) { ?>
            <div class="card-body ">
                <div class="card w-96 bg-base-100 shadow-xl ">
                    <div class="card-body">
                        <h2>id (<?= $activities->activity_id ?>) : <?= $activities->name_activity ?></h2>

                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
    </div>
<?php require "./footer.php" ?>