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

    <div class="grid grid-cols-2">
        <div class="top-part">


            <div class="card w-906 h-50 bg-base-100 shadow-xl ml-8 mt-10  ">

                <p> <?= $affichage_icon ?> </p>

                <div class="card-body">
                    <p><?= $temperature_in_celsius ?> ° </p>
                    <p><?= $temperature_current_name; ?></p>
                 
                    <p> <?= $temperature_current_weather; ?> </p>
                </div>

                <div class="card-body bg-gradient-to-r from-indigo-200">

                    <p> vitesse du vent <?= $temperature_current_wind ?> </p>
                    <p> description : <?= $temperature_current_weather_description; ?> </p>
                    <p> humidity : <?= $temperature_current_main_humidity; ?> </p>
                    <p> pressure : <?= $temperature_current_main_pressure; ?> </p>
                    <p> nuages : <?= $temperature_current_clouds; ?>%</p>
                    <p> temp max : <?= $temperature_max_in_celsius; ?></p>
                    <p> temp min : <?= $temperature_min_in_celsius; ?></p>
                    <p> ressentis : <?= $temperature_feels_in_celsius; ?></p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-6 ">

            <?php foreach ($activity as $activities) { ?>

                <div class="card-body ">

                    <div class="card w-80 bg-base-100 shadow-xl hover:bg-secondary/50">
                        <h1 class="flex justify-center"><strong> <?= $activities->name_activity ?></strong></h1>
                        <h2 class="flex justify-center"> <?= $activities->environ_name ?> </h2>
                        <div class="card-body">
                            <h2>
                                <?php if ($activities->score = 5) { ?>

                                    <?= $activities->score ?> / 5<br>
                                <?php } ?>
                            </h2>

                        </div>
                    </div>
                </div>
                <br>
            <?php } ?>

        </div>
    </div>
<?php require "./footer.php" ?>