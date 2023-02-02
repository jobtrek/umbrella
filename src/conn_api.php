<?php
require "../vendor/autoload.php";

$api_key = $_ENV['OPEN_WEATHER_API_KEY'];
$city_name = "Paris";


$api_url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city_name . '&appid=' . $api_key;


$weather_data = json_decode(file_get_contents($api_url), true);

// temperature et fahrenheit to celsius
$temperature = $weather_data['main']['temp'];
$temperature_in_celsius = round($temperature - 273.15);

// main et description
$temperature_current_weather = $weather_data['weather'][0]['main'];
$temperature_current_weather_description = $weather_data['weather'][0]['description'];

// icon
$temperature_current_weather_icon = $weather_data['weather'][0]['icon'];
$affichage_icon = "<img src='http://openweathermap.org/img/wn/" . $temperature_current_weather_icon . "@2x.png' />";
