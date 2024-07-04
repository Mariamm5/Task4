<?php
session_start();

if (isset($_POST['send'])) {
    if (empty($_POST['city'])) {

        header("Location:index.php");
        $_SESSION['input']['error'] = "Can't bee empty!";
    } else {
        unset($_SESSION['input']['error']);
        $cityName = $_POST['city'];
        $key = '286c7dcd9cb95c4a8127876eaaad5d97';
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$cityName&appid=$key";
        $init = curl_init();

        curl_setopt($init, CURLOPT_URL, $url);
        curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($init);
        if ($e = curl_error($init)) {
            echo $e;
        } else {
            $decoded = json_decode($res);
            $_SESSION['cityName'] = $decoded->name;
            $_SESSION['temp'] = round($decoded->main->temp - 275.15);
            $_SESSION['wind'] = round($decoded->wind->speed);
            $_SESSION['description'] = $decoded->weather[0]->description;
            header("Location:index.php");
        }
    }

}
