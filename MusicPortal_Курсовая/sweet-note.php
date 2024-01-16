<?php 
include "SQL_connection/connection.php";
$musicquery = $conn->query("select Musics.Link, Musics.MusicName, Users.Login from musics join Users where Musics.Id_user = Users.Id");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Sweet-Note</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <nav>
        <div class="first"><a href="entrance.php">♪ Вход ♪</a></div>
        <div class="first"><a href="registration.php">♪ Регистрация ♪</a></div> 
    </nav>
    <div style="width: 100%; height: 100%; display: flex; flex-direction: column;
    align-items: center;">
        <div class="second"><h1 class="hello">Добро пожаловать в Sweet-Note!♪!</h1></div>
        <div style="width: 75%; display: flex; flex-direction: column-reverse;
            justify-content: flex-end; background-color: rgba(255, 255, 255, 0.733); margin-top: 1%;">
            <?php 
                while ($musicrow = $musicquery->fetch())
                {
                    echo "<div style='display: flex; align-items: center; flex-direction: row-reverse; justify-content: flex-end;'>";
                    echo "<h3 style='margin: 1%'>" . $musicrow['MusicName'] . "</h3>";
                    echo "<h3 style='margin: 1%; color: white; text-shadow: 0 0 1em blue, 0 0 0.2em blue;'>" . $musicrow['Login'] . "</h3>";
                    echo "<audio controls='controls' style='width: 50%; margin: 2%'>";
                    echo "<source src='" . $musicrow['Link'] . "' type='audio/mpeg' />";
                    echo "</audio>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>