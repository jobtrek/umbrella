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
    <div class="bg-gradient-to-b from-primary">
        <div class="card-body scroll-auto bottom-0 ">
            <div class="top-part grid grid-cols-2 mt-10 ">
                <div class="card w-10/12 bg-base-100 shadow-xl ml-8 mt-10">

                    <p> <?= $affichage_icon ?> </p>

                    <div class="card-body ">
                        <p class="text-6xl mb-10"><strong><?= $temperature_current_name; ?></strong></p>

                        <p class="text-4xl mb-5"><strong><?= $temperature ?> ° </strong></p>
                        <?php if ($temperature_current_weather === "Haze") {
                            $temperature_current_weather = "Clouds";

                        }
                        ?>
                        <p class="text-2xl mb-5"> <?= $temperature_current_weather_description; ?> </p>
                        <p class="text-2xl"> <?= $date; ?> </p>
                    </div>

                    <div class="card-body ">

                        <p> vitesse du vent <?= $temperature_current_wind ?> km/h </p>
                        <p> humidity : <?= $temperature_current_main_humidity; ?> % </p>
                        <p> pressure : <?= $temperature_current_main_pressure; ?> </p>
                        <p> nuages : <?= $temperature_current_clouds; ?>%</p>
                        <p> temp max : <?= $temperature_max; ?> ° </p>
                        <p> temp min : <?= $temperature_min; ?> °</p>
                        <p> ressentis : <?= $temperature_feels; ?> ° </p>
                    </div>
                </div>
                <div class="grid grid-cols-2 mt-10 place-items-center">

                    <?php foreach ($activity as $activities) { ?>

                        <div class="card-body ">
                            <div class="card w-72 bg-base-100 shadow-xl hover:bg-gradient-to-l from-indigo-200 ">
                                <div class="card-body">
                                    <h2 class="grid grid-rows-3 gap-10">
                                        <p class="flex justify-center text-2xl">
                                            <strong><?= $activities->name_activity ?></strong>
                                        </p>
                                        <div class="flex flex-row">
                                            <p class="text-2xl flex justify-center"><?= $activities->score ?> / 5</p>
                                            <p class="text-2xl flex justify-center"><?= $activities->environ_name ?></p>
                                        </div>

                                    </h2>

                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>


            <div class="grid grid-cols-5">
                <?php for ($i = 1; $i <= 5; $i++) { ?>

                    <div class="card-body ">

                        <div class="card bg-base-100 shadow-xl mt-10 mb-10  ">
                            <div class="card-body w-60 ">
                                <p>Today </p>
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
            <div class="grid grid-cols-5">

                <?php for ($i = 1; $i <= 39; $i++) {
                    $dateHour = $weather_data["list"][$i]['dt_txt'];
                    $hour = explode(" ", $dateHour);

                    if ($hour[1] === "15:00:00") {
                        ?>
                        <div class="card-body grid grid-cols-5">
                            <div class="card-body w-60 bg-base-100 shadow-xl ">
                                <div class="card-body">
                                    <h2>
                                        <p> <?php $temperature_current_weather_icon = $weather_data["list"][$i]['weather'][0]['icon']; ?> </p>
                                        <p> <?= $affichage_icon = "<img src='http://openweathermap.org/img/wn/"
                                                . $temperature_current_weather_icon . "@2x.png'/>"; ?> </p>
                                        <p> <?= round($weather_data["list"][$i]['main']['temp']); ?>
                                            °</p>
                                        <p> <?= $date = $weather_data["list"][$i]['dt_txt']; ?></p>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>

                <br><br>
            </div>
        </div>
    </div>
<?php require "./footer.php" ?>