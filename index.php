<?php
session_start();
include_once("action.php");
global $weatherData;
if (isset($_SESSION['weatherData'])) {
    $weatherData = $_SESSION['weatherData'];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Weather</title>
</head>
<body>
<form action="action.php" method="post">
    <label>
        <input type="text" name="city" placeholder="Write City Name" class="text">
    </label>
    <input type="submit" value="SEND" name="send" class="send">
</form>

<div class="card">

    <div class="card">
        <span style="color: red">
            <?php
            if (isset($_SESSION['input']['error'])) {
                echo $_SESSION['input']['error'];
            } else {
                unset($_SESSION['input']['error']);
            }
            ?>
        </span>
        <?php if (isset($weatherData)): ?>
            <h1>Country Name: <span><?= htmlspecialchars($weatherData->name); ?></span></h1>
            <h1>Temperature is: <span><?= round($weatherData->main->temp - 273.15); ?>°C</span></h1>
            <h1>Wind Speed is: <span><?= round($weatherData->wind->speed); ?> km/h</span></h1>
            <h1>Clouds Type is: <span><?= htmlspecialchars($weatherData->weather[0]->description); ?></span></h1>
        <?php endif; ?>
    </div>
</div>


</body>
</html>