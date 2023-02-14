<?php
require "../vendor/autoload.php";
require_once "conn_db.php";
$api_key = $_ENV['OPEN_WEATHER_API_KEY'];
$city_name = $_GET['city'] ?? null;

if ($city_name != null) {

    $api_url = 'http://api.openweathermap.org/data/2.5/forecast?q=' . $city_name . '&appid=' . $api_key . '&units=metric&lang=fr';

    if (array_key_exists('submit', $_GET)) {
        if (!empty($city_name) and $weather_data['cod'] == 200) {
            header('Location: ./weather.php?city=' . $city_name . ' ');
        } else {
            header('Location: ./index.php');
            echo "Le nom de la ville est invalide.";
        }
    }

    $weather_data = json_decode(file_get_contents($api_url), true);

// temperature + fahrenheit to celsius

    $temperature = round($weather_data["list"][0]['main']['temp']);
    $temperature_max = round($weather_data["list"][0]['main']['temp_min']);
    $temperature_min = round($weather_data["list"][0]['main']['temp_max']);
    $temperature_feels = round($weather_data["list"][0]['main']['feels_like']);

// data une par une

    $temperature_current_weather = $weather_data["list"][0]['weather'][0]['main'];
    $temperature_current_weather_description = $weather_data["list"]['0']['weather'][0]['description'];
    $temperature_current_wind = $weather_data["list"][0]['wind']['speed'];
    $temperature_current_main_humidity = $weather_data["list"][0]['main']['humidity'];
    $temperature_current_main_pressure = $weather_data["list"][0]['main']['pressure'];
    $temperature_current_name = $weather_data['city']['name'];
    $temperature_current_clouds = $weather_data["list"][0]['clouds']['all'];
    $date = $weather_data["list"][0]['dt_txt'];
// icon

    $temperature_current_weather_icon = $weather_data["list"][0]['weather'][0]['icon'];
    $affichage_icon = "<img src='http://openweathermap.org/img/wn/" . $temperature_current_weather_icon . "@2x.png' />";

}