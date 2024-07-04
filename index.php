<?php
session_start();
include_once("action.php");
global $decoded;
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
    <input type="text" name="city" placeholder="Write City Name" class="text">
    <input type="submit" value="SEND" name="send" class="send">
</form>

<div class="card">

    <div class="card">
        <span style="color: red">
            <?php
            if (isset($_SESSION['input']['error'])) {
                echo $_SESSION['input']['error'];
            }else{
                unset($_SESSION['input']['error']);
            }
            ?>
        </span>
        <h1>Country Name:<span><?php echo $_SESSION['cityName']; ?></span></h1>
        <h1>Temperature is:<span><?php echo $_SESSION['temp']; ?></span></h1>
        <h1>Wind Speed is:<span><?php echo $_SESSION['wind'] . " km/h"; ?></span></h1>
        <h1>Clouds Type is:<span><?php echo $_SESSION['description']; ?></span></h1>
    </div>
</div>
<?php

?>
<?php //if (isset($res)) {
//    foreach ($decoded as $i) {
//       echo "<h2>".$i['name']."</h2>";
//    }
//
//} ?>

</body>
</html>