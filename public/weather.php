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
    <div class="part-all scroll-auto bottom-0">
        <div class="top-part grid grid-cols-2 mt-10 ">
            <div class="card w-10/12 bg-base-100 shadow-xl ml-8 mt-10 bg-gradient-to-b ">

                <p> <?= $affichage_icon ?> </p>

                <div class="card-body ">
                    <p class="text-xl"><strong><?= $temperature ?> ° </strong></p>
                    <p class="text-xl"><strong><?= $temperature_current_name; ?></strong></p>
                    <?php if ($temperature_current_weather === "Haze") {
                        $temperature_current_weather = "Clouds";

                    }
                    ?>
                    <p> <?= $temperature_current_weather_description; ?> </p>
                    <p> <?= $date; ?> </p>
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
                                <h2>
                                    id : <?= $activities->activity_id ?> <br>
                                    activity : <?= $activities->name_activity ?><br>
                                    score : <?= $activities->score ?><br>
                                    environ : <?= $activities->environ_name ?><br>

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
                    <div class="card  bg-base-100 shadow-xl mt-10 mb-10 ">
                        <div class="card-body w-60">
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

        <?php for ($i = 1; $i <= 39; $i++) {
            $dateHour = $weather_data["list"][$i]['dt_txt'];
            $hour = explode(" ", $dateHour);

            if ($hour[1] === "15:00:00") {
                ?>
                <div class="card-body ">
                    <div class="card w-96 bg-base-100 shadow-xl ">
                        <div class="card-body">
                            <h2>
                                <p> <?php $temperature_current_weather_icon = $weather_data["list"][$i]['weather'][0]['icon']; ?> </p>
                                <p> <?= $affichage_icon = "<img src='http://openweathermap.org/img/wn/"
                                        . $temperature_current_weather_icon . "@2x.png'/>"; ?> </p>
                                <p> <?= round($weather_data["list"][$i]['main']['temp']); ?> °</p>
                                <p> <?= $date = $weather_data["list"][$i]['dt_txt']; ?></p>
                            </h2>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>

        <br><br>

    </div>
<?php require "./footer.php" ?>