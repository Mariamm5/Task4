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
<form action="action.php" method="get">
    <label>
        <input type="text" name="city" placeholder="Write City Name" class="text">
    </label>
    <input type="submit" value="SEND" name="send" class="send">
</form>

<?php
if (isset($_GET['error'])) {
    echo '<div class="error">' . htmlspecialchars($_GET['error']) . '</div>';
}

if (isset($_GET['name']) && isset($_GET['temp']) && isset($_GET['speed']) && isset($_GET['description'])) {
    echo '<div class="card">';
    echo '<h1>Country Name: <span>' . htmlspecialchars($_GET['name']) . '</span></h1>';
    echo '<h1>Temperature is: <span>' . round($_GET['temp'] ) . '°C</span></h1>';
    echo '<h1>Wind Speed is: <span>' . round($_GET['speed']) . ' km/h</span></h1>';
    echo '<h1>Clouds Type is: <span>' . htmlspecialchars($_GET['description']) . '</span></h1>';
    echo '</div>';
}
?>

</body>
</html>
