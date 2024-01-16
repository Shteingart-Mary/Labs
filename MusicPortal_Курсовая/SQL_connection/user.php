<?php 
include "connection.php";
$getlogin = $_GET['login'];
$query = $conn->query("select Users.Login, Users.Password, Roles.Id, Roles.Role from Users join Roles where Login = '$getlogin' and Users.Role = Roles.Id;");
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
            <fieldset style="margin: 5%">
                <div class="center">
                    <div class="margin">
                        <select name="role" id="role" >
                            <?php 
                            $rolesquery = $conn->query("select * from roles");
                            while ($rowroles = $rolesquery->fetch()){
                                if ($rowroles['Id'] == $row['Id']) {
                                    echo "<option selected value='" . $rowroles['Id'] . "'>" . $rowroles['Role'] . "</option>"; }
                                else {
                                    echo "<option value='" . $rowroles['Id'] . "'>" . $rowroles['Role'] . "</option>"; }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="margin">
                        <input type="text" value="<?php echo $row['Login']?>" name="login">
                    </div>
                    <div class="margin">
                        <input type="text" value="<?php echo $row['Password']?>" name="password">
                    </div>
                    <div class="margin">
                        <button name="change">Изменить</button>
                    </div>
                    <div class="margin">
                        <button name="delete">Удалить</button>
                    </div>
                    <div class="margin">
                        <button>
                            <a style="font-size: 13px; text-shadow: none;" href="Admin_panel.php">Отмена</a>
                        </button>
                    </div>
                </div>    
            </fieldset>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST["change"]) and ($_POST["login"] !== $row['Login'] || $_POST["password"] !== $row['Password'] || $_POST["role"]))
{
    $login = $_POST["login"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $conn->exec("update Users set Login = '$login', Password = '$password', Role='$role' where Login = '$getlogin';");
    header("Location:" . "http://localhost/musicportal/sql_connection/admin_panel.php");
}
if (isset($_POST["delete"]))
{
    $conn->exec("delete from Users where Login = '$getlogin';");
    header("Location:" . "http://localhost/musicportal/sql_connection/admin_panel.php");
}
?>

