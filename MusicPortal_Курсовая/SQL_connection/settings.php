<?php 
include "connection.php";
$getlogin = $_SESSION['login'];
$query = $conn->query("select * from Users where Login = '$getlogin';");
$row = $query->fetch();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet-Note</title>
    <link rel="stylesheet" href="../main.css">
</head>
<body style="display: flex; flex-direction: column; align-items: center;">
    <div class="container">
        <form method="POST" class="flex">
            <fieldset>
                <div class="center">
                    <div class="margin">
                        <h1 class="word">Настройки</h1>
                    </div>
                    <div class="margin">
                        <input type="text" value="<?php echo $row['Surname']?>" name="surname">
                    </div> 
                    <div class="margin">
                        <input type="text" value="<?php echo $row['Name']?>" name="name">
                    </div> 
                    <div class="margin">
                        <input type="date" value="<?php echo $row['Date']?>" name="date">
                    </div>
                    <div class="margin">
                        <input type="text" value="<?php echo $row['Login']?>" name="login">
                    </div>
                    <div class="margin">
                        <input type="text" value="<?php echo $row['Password']?>" name="password" minlength="8">
                    </div>
                    <div class="margin">
                        <button name="change">Изменить</button>
                    </div>
                    <div class="margin">
                        <button>
                            <a style="font-size: 13px; text-shadow: none;" href="../profil.php">Отмена</a>
                        </button>
                    </div>
                </div>
            </fieldset>  
        </form>
    </div>
</body>
</html>
<?php if (isset($_POST["change"]) and ($_POST["login"] !== $row['Login'] || $_POST["password"] !== $row['Password']))
{
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $date = $_POST["date"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $conn->exec("update Users set Surname = '$surname', Name = '$name', Date = '$date', 
                    Login = '$login', Password = '$password' where Login = '$getlogin';");
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    header("Location:" . "http://localhost/musicportal/profil.php");
} 
?>
