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
            <p><?= $temperature ?> ° </p>
            <p><?= $temperature_current_name; ?></p>
            <p> <?= $temperature_current_weather_description; ?> </p>
            <p> <?= $date; ?> </p>
        </div>

        <div class="card-body bg-gradient-to-r from-indigo-200">

            <p> vitesse du vent <?= $temperature_current_wind ?> km/h </p>
            <p> humidity : <?= $temperature_current_main_humidity; ?> % </p>
            <p> pressure : <?= $temperature_current_main_pressure; ?> </p>
            <p> nuages : <?= $temperature_current_clouds; ?>%</p>
            <p> temp max : <?= $temperature_max; ?> ° </p>
            <p> temp min : <?= $temperature_min; ?> °</p>
            <p> ressentis : <?= $temperature_feels; ?> ° </p>
        </div>
    </div>

    <div>
        <?php for ($i = 1; $i <= 4; $i++) { ?>

            <div class="card-body ">
                <div class="card w-96 bg-base-100 shadow-xl ">
                    <div class="card-body">
                        <h2>
                            <p> <?php $temperature_current_weather_icon = $weather_data["list"][$i]['weather'][0]['icon']; ?> </p>
                            <p> <?= $affichage_icon = "<img src='http://openweathermap.org/img/wn/"
                                    . $temperature_current_weather_icon . "@2x.png'/>"; ?>  </p>
                            <p> <?= round($weather_data["list"][$i]['main']['temp']); ?> °</p>
                            <p> <?= $date = $weather_data["list"][$i]['dt_txt']; ?></p>

                        </h2>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>

    <div>
        <?php for ($i = 8; $i <= 39; $i += 8) { ?>

            <div class="card-body ">
                <div class="card w-96 bg-base-100 shadow-xl ">
                    <div class="card-body">
                        <h2>
                            <p> <?php $temperature_current_weather_icon = $weather_data["list"][$i]['weather'][0]['icon']; ?> </p>
                            <p> <?= $affichage_icon = "<img src='http://openweathermap.org/img/wn/"
                                    . $temperature_current_weather_icon . "@2x.png'/>"; ?>  </p>
                            <p> <?= round($weather_data["list"][$i]['main']['temp']); ?> °</p>
                            <p> <?= $date = $weather_data["list"][$i]['dt_txt']; ?></p>

                        </h2>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>

    <br><br>
    <div class="grid grid-cols-4 gap-4">

        <?php foreach ($activity as $activities) { ?>

            <div class="card-body ">
                <div class="card w-96 bg-base-100 shadow-xl ">
                    <div class="card-body">
                        <h2>
                            id : <?= $activities->activity_id ?> <br>
                            activity : <?= $activities->name_activity ?><br>
                            score : <?= $activities->score ?><br>
                            environ : <?= $activities->environ_name ?><br>

                        </h2>

                    </div>
                </div>
            </div>
            <br>
        <?php } ?>

    </div>
<?php require "./footer.php" ?>