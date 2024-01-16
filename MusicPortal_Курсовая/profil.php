<?php 
include "SQL_connection/connection.php";
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$query = $conn->query("select * from users where Login = '$login' and Password = '$password';");
$row = $query->fetch();
$Id_user = $row["Id"];
$musicquery = $conn->query("select * from musics where Id_user = '$Id_user'");
$link;
if (isset($_POST["music"])){
    if ($_FILES and $_FILES["file"]["error"] == UPLOAD_ERR_OK){
        $file_name = "SQL_connection/user_audio/" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);
        $link = $file_name;
        $musicname = $_POST['Musicname'];
        $conn->exec("insert into Musics (Id_user, MusicName, Link) 
            values ($Id_user, '$musicname' , '$link');");
            header('Location: '. $_SERVER['PHP_SELF']);
    }
}
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
        <div class="first"><img src="SQL_connection/<?php echo $_SESSION['photo']; ?>" alt="picture" style="width: 15%; border-radius: 15%; margin: 5%;"><a><?php echo $_SESSION["login"]; ?></a></div>
        <div class="first"><a href="mainpage.php">Главная</a></div> 
        <?php if ($row["Role"] == 1){ echo "<div class='first'><a href='SQL_connection/settings.php'>Настройки</a></div>"; }
        else {
            echo "<div class='first'><a href='SQL_connection/admin_panel.php'>Настройки</a></div>";
        } ?>
        <div class="first"><a href="SQL_connection/logout.php">Выйти</a></div> 
    </nav>
    <div style="display: flex; flex-direction: column; align-items: center; margin-top: 1%;">
        <div class="navnav">
            <div class="third">
                <img src="SQL_connection/<?php echo $_SESSION['photo']; ?>" alt="picture" style="width: 100%; border-radius: 15%; ">
            </div>
            <div class="third">
                <h2 style="color: white;"><?php echo $row["Surname"]; ?></h2>
                <h2 style="color: white;"><?php echo $row["Name"]; ?></h2>
                <h2 style="color: white;"><?php echo $row["Date"]; ?></h2>
            </div>
            <div class="third margin">
                <form method="POST" enctype="multipart/form-data">
                    <label class="photo">
                        <input name="file" type="file" accept="audio/*" >  
                        <span style="padding: 20px 120px; margin: 2%">Добавить</span> 
                    </label>
                    <input type="text" name="Musicname" class="margin" placeholder="Название песни и комментарий" maxlength="45" required>  
                    <button  type="submit" name="music"  class="margin">Сохранить</button>
                </form>
            </div>  
        </div>
    </div>
    <div style="width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center;">
        <div style="width: 75%; display: flex; flex-direction: column-reverse;
    justify-content: flex-end; background-color: rgba(255, 255, 255, 0.733); margin-top: 1%;">
            <?php 
                while ($musicrow = $musicquery->fetch())
                {
                    echo "<div style='display: flex; align-items: center; flex-direction: row-reverse; justify-content: flex-end;'>";
                    echo "<h3>" . $musicrow['MusicName'] . "</h3>";
                    echo "<audio controls='controls' style='width: 50%; margin: 2%'>";
                    echo "<source src='" . $musicrow['Link'] . "' type='audio/mpeg' />";
                    echo "</audio>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
   <script src="photo.js"></script>
</body>
</html>