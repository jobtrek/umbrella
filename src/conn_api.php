<?php
require "../vendor/autoload.php";

$api_key = $_ENV['OPEN_WEATHER_API_KEY'];
$city_name = $_GET['city'];

$api_url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city_name . '&appid=' . $api_key;


if (array_key_exists('submit', $_GET)) {
    //check si l'input est vide
    if (!$_GET['city']) {
        $error = "Désolé, le champ est vide.";
    } else {
        $error = "Le nom de la ville est invalide.";
    }
}

$weather_data = json_decode(file_get_contents($api_url), true);

// temperature + fahrenheit to celsius
$temperature = $weather_data['main']['temp'];
$temperature_in_celsius = round($temperature - 273.15);

$temperature_max = $weather_data['main']['temp_min'];
$temperature_max_in_celsius = round($temperature_max - 273.15);

$temperature_min = $weather_data['main']['temp_max'];
$temperature_min_in_celsius = round($temperature_min - 273.15);

$temperature_feels = $weather_data['main']['feels_like'];
$temperature_feels_in_celsius = round($temperature_feels - 273.15);


// data une par une
$temperature_current_weather = $weather_data['weather'][0]['main'];
$temperature_current_weather_description = $weather_data['weather'][0]['description'];
$temperature_current_wind = $weather_data['wind']['speed'];
$temperature_current_main_humidity = $weather_data['main']['humidity'];
$temperature_current_main_pressure = $weather_data['main']['pressure'];
$temperature_current_name = $weather_data['name'];
$temperature_current_clouds = $weather_data['clouds']['all'];


// icon

$temperature_current_weather_icon = $weather_data['weather'][0]['icon'];
$affichage_icon = "<img src='http://openweathermap.org/img/wn/" . $temperature_current_weather_icon . "@2x.png' />";