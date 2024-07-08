<?php
if (isset($_GET['send'])) {
    if (empty($_GET['city'])) {
        $error = "City name cannot be empty!";
        header("Location: index.php?error=" . urlencode($error));
        exit();
    } else {
        $cityName = $_GET['city'];
        $key = '286c7dcd9cb95c4a8127876eaaad5d97';
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$cityName&appid=$key";

        $init = curl_init();
        curl_setopt($init, CURLOPT_URL, $url);
        curl_setopt($init, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($init);

        if ($e = curl_error($init)) {
            $error = "Error: " . $e;
            header("Location: index.php?error=" . urlencode($error));
            exit();
        } else {
            $decoded = json_decode($res);

            $name = htmlspecialchars($decoded->name);
            $temp = round($decoded->main->temp - 273.15);
            $speed = round($decoded->wind->speed);
            $description = htmlspecialchars($decoded->weather[0]->description);

            header("Location: index.php?name=$name&temp=$temp&speed=$speed&description=$description");
            exit();
        }
    }
}
