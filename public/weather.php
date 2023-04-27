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
        <div class="card-body">
            <div class="grid grid-cols-2 justify-items-center">
                <div class="card w-10/12 bg-base-100 shadow-xl  mt-10">
                    c

                    <div class="card-body gap-15 ml-5">

                        <p class="flex justify-end"> <?= $affichage_icon ?> </p>

                        <div class="flex flex-row">
                            <p class="text-6xl  "><strong><?= $temperature_current_name; ?></strong></p>
                            <?php
                            $date_hour2 = explode(" ", $date); ?>
                            <p class="text-4xl flex justify-end mt-4 mr-5"><strong> <?= $date_hour2[0]; ?></strong></p>
                        </div>

                        <p class="text-4xl "><strong><?= $temperature ?> ° </strong></p>

                        <?php if ($temperature_current_weather === "Haze") {
                            $temperature_current_weather = "Clouds";
                        }
                        ?>

                        <p class="text-2xl capitalize"> <?= $temperature_current_weather_description; ?> </p>
                        <?php
                        $date_hour1 = explode(" ", $date); ?>
                        <div class="flex flex-row ">
                            <p class="text-2xl"><?= $date_hour1[1] ?> </p>
                        </div>
                    </div>

                    <div class="card-body flex text-center ">

                        <p class="capitalize text-1xl grid grid-cols-2 justify-items-center"> vitesse du vent :
                            <strong class="flex justify-center"><?= $temperature_current_wind ?>km/h</strong>
                        </p>
                        <p class="capitalize text-1xl grid grid-cols-2 justify-items-center"> humidité :
                            <strong class="flex justify-center"><?= $temperature_current_main_humidity; ?>%</strong>
                        </p>
                        <p class="capitalize text-1xl grid grid-cols-2 justify-items-center"> nuages :
                            <strong class="flex justify-center"><?= $temperature_current_clouds; ?>%</strong>
                        </p>
                        <p class="capitalize text-1xl grid grid-cols-2 justify-items-center"> température max :
                            <strong class="flex justify-center"> <?= $temperature_max; ?>°</strong>
                        </p>
                        <p class="capitalize text-1xl grid grid-cols-2 justify-items-center"> température min :
                            <strong class="flex justify-center"> <?= $temperature_min; ?>°</strong>
                        </p>
                        <p class="capitalize text-1xl grid grid-cols-2 justify-items-center"> ressentis :
                            <strong class="flex"> <?= $temperature_feels; ?>°</strong>
                        </p>
                    </div>
                </div>
                <div>
                    <div class="grid grid-cols-2 place-items-center ">

                        <?php foreach ($activity as $activities) { ?>

                            <div class="card-body mt-10">
                                <div
                                    class="card w-60 h-60 bg-base-100 shadow-xl hover:bg-gradient-to-l from-indigo-200 ">
                                    <div class="card-body">
                                        <h2 class="grid grid-rows-3 gap-3">
                                            <p class="flex justify-center card-title">
                                                <strong><?= $activities->name_activity ?></strong>
                                            </p>
                                            <div class="flex flex-row mt-7">
                                                <p class="text-2xl flex justify-center"><?= $activities->score ?> /
                                                    5</p>
                                                <p class="text-2xl flex justify-center capitalize"><?= $activities->environ_name ?></p>
                                            </div>

                                        </h2>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>

                </div>
                <div>
                </div>

            </div>

            <h2 class="text-center text-2xl mt-10"><strong>Prochaines Heures</strong></h2>
            <div class="grid grid-cols-5">
                <?php for ($i = 1; $i <= 5; $i++) { ?>

                    <div class="card-body ">

                        <div class="card bg-base-100 shadow-xl mt-10 mb-10 flex flex-col">
                            <div class="card-body ">

                                <p class="card-title text-sm ">Aujourd'hui</p>
                                <?php $datetime = $weather_data["list"][$i]['dt_txt'];
                                $date_hour = explode(" ", $datetime); ?>
                                <p><?= $date_hour[1] ?> </p>
                                <p> <?= $date_hour[0]; ?></p>
                                <h2>
                                    <p> <?php $temperature_current_weather_icon = $weather_data["list"][$i]['weather'][0]['icon']; ?> </p>
                                    <p class="flex justify-center"> <?= $affichage_icon = "<img src='http://openweathermap.org/img/wn/"
                                            . $temperature_current_weather_icon . "@2x.png'/>"; ?>  </p>
                                    <p class="flex justify-center">
                                        <strong><?= round($weather_data["list"][$i]['main']['temp']); ?>°</strong></p>

                                </h2>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <h2 class="text-center mb-10 text-2xl"><strong>Prochains jours</strong></h2>

            <div class="flex flex-row justify-center space-x-28 mb-10">

                <?php for ($i = 1; $i <= 39; $i++) {
                    $datetime = $weather_data["list"][$i]['dt_txt'];
                    $date_hour = explode(" ", $datetime);

                    if ($date_hour[1] === "15:00:00") {

                        ?>
                        <div class="mb-10">
                            <div class="card bg-base-100 shadow-xl ">
                                <div class="card-body bg-base-100 ">
                                    <p class="card-title text-sm ">
                                        <?php
                                        ?> </p>
                                    <h2 class="flex flex-row justify-center w-40 gap-10x">
                                        <p class="card-title text-sm"> <?= $date = $weather_data["list"][$i]['dt_txt']; ?></p>

                                        <p> <?php $temperature_current_weather_icon = $weather_data["list"][$i]['weather'][0]['icon']; ?> </p>
                                        <p> <?= $affichage_icon = "<img src='http://openweathermap.org/img/wn/"
                                                . $temperature_current_weather_icon . "@2x.png'/>"; ?> </p>

                                    </h2>
                                    <p class="flex justify-center"> <?= round($weather_data["list"][$i]['main']['temp']); ?>
                                        °</p>
                                </div>
                            </div>

                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </div>

<?php require "./footer.php" ?>