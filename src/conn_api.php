    <?php
require "../vendor/autoload.php";
require_once "conn_db.php";


$api_key = $_ENV['OPEN_WEATHER_API_KEY'];
$city_name = $_GET['city'] ?? null;

if ($city_name != null) {
    $api_url = 'http://api.openweathermap.org/data/2.5/forecast?q=' . $city_name . '&appid=' . $api_key . '&units=metric&lang=fr';
    $weather_data = json_decode(@file_get_contents($api_url), true);

    if (array_key_exists('submit', $_GET)) {
        $api_url = 'http://api.openweathermap.org/data/2.5/forecast?q=' . $city_name . '&appid=' . $api_key . '&units=metric&lang=fr';
        $weather_data = json_decode(@file_get_contents($api_url), true);

        if ($weather_data !== null && array_key_exists('list', $weather_data)) {
            header('Location: ./weather.php?city=' . $city_name);
        } else {
            header('Location: ../error.php');
        }
    }

    // Le reste du code pour afficher les données météo pour une ville valide

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
