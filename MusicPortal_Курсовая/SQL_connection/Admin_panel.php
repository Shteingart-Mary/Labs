<?php 
include "connection.php";
$getlogin = $_SESSION['login'];
$query = $conn->query("select * from Users where Login = '$getlogin';");
$row = $query->fetch();
?>
<!DOCTYPE html>
<html lang="RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet-Note</title>
    <link rel="stylesheet" href="../main.css">
</head>
<body style="display: flex; flex-direction:column;  align-items: center;">
    <div class="container">
        <form method="POST" class="flex">
            <fieldset style="margin: 5%">
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
                            <a style="font-size: 13px; text-shadow: none;" href="../profil.php">Назад</a>
                        </button>
                    </div>      
                </div>
            </fieldset>  
        </form>                
    </div>
    <div class="container">
        <form method="POST" class="flex">
            <div class="margin">
            <h2 style="color: white">Список пользователей:</h2>
            <?php   
            $query = $conn->query("select * from Users;");
            while ($row = $query->fetch())
            {
                echo "<a style='font-size: 20px; text-shadow: none;' href='user.php?login=" . $row["Login"] . "'>" . $row["Login"] . "</a><br>";
            }
            ?> 
            </div>
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